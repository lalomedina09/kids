<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Helpers\Filter;
use App\Http\Requests\Dashboard\Authorization\UpdateRequest;
use App\Models\{ Permission, Role, User };

use DB;

class AuthorizationController extends Controller
{

    private $query;

    /**
     * Create a new resource instance
     *
     */
    public function __construct()
    {
        $this->query = User::withTrashed();
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $base = $this->getBaseFilters();
        $search = $request->has('filters');
        $filters = ($search) ? $request->get('filters') : [];

        return view('dashboard.roles.index')->with([
            'users' => $this->search($filters),
            'roles' => Role::all(),
            'base' => $base,
            'search' => $search,
            'filters' => $filters
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->query
            ->with('roles')
            ->findOrFail($id);

        return view('dashboard.roles.show')->withUser($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->query->findOrFail($id);
        $user_permissions = $user->getPermissionsViaRoles()->unique('id')->pluck('id')->all();

        $direct_permissions = Permission::whereNotIn('id', $user_permissions)->get();

        return view('dashboard.roles.edit')->with([
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => $direct_permissions
        ]);
    }

    /**
     * Set user role
     *
     * @param  int|string  $id
     * @param  \App\Http\Requests\Dashboard\Authorization\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateRequest $request)
    {
        $user = $this->query->findOrFail($id);

        if (!$request->has('roles')) {
            $user->syncRoles();
        } else {
            $user->syncRoles($request->get('roles'));
        }

        if (!$request->has('permissions')) {
            $user->syncPermissions();
        } else {
            $user->syncPermissions($request->get('permissions'));
        }

        $user->syncRolesRelationships();

        return redirect()->route('dashboard.authorization.edit', [$id])
            ->with('success', "Los roles y permisos fueron modificados exitosamente.");
    }

    /*
    |--------------------------------------------------------------------------
    | Private methods
    |--------------------------------------------------------------------------
    */

    /**
     * Search sessions from a parent
     *
     * @return array
     */
    private function getBaseFilters()
    {
        $roles = Role::all()->pluck('label', 'name')->all();
        return [
            'roles' => array_merge(['0' => 'Todos'], $roles),
            'limit' => [
                '10' => '10',
                '20' => '20',
                '50' => '50',
                '100' => '100'
            ],
            'default' => [
                'role' => '*',
                'limit' => '10'
            ]
        ];
    }

    /**
     * Search sessions from a parent
     *
     * @param array $filters
     * @return \Illuminate\Support\Collection
     */
    private function search($filters)
    {
        $users = $this->query
            ->with(['roles', 'permissions'])
            ->withCount('roles')
            ->withCount('permissions')
            ->orderBy('roles_count', 'desc');

        if (array_has($filters, 'name') && $filters['name'] && strlen($filters['name']) >= 3) {
            $name_filter = '%'.$filters['name'].'%';
            $users = $users->where(DB::raw('CONCAT(name, " ", IFNULL(last_name,""))'), 'like', $name_filter);
        }

        if (array_has($filters, 'role') && $filters['role']) {
            $role_filter = $filters['role'];
            $users = $users->whereHas('roles', function ($roles_query) use ($role_filter) {
                $roles_query->where('name', $role_filter);
            });
        }

        $pagination = (array_has($filters, 'limit') && is_numeric($filters['limit'])) ? Filter::setPagination($filters['limit'], 10) : 10;
        $users = $users->paginate($pagination);
        $users->appends(['filters' => $filters]);

        return $users;
    }
}
