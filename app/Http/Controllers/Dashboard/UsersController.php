<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{ Request, Response };

use App\Helpers\Filter;
use App\Http\Requests\Dashboard\Users\{ StoreRequest, UpdateRequest };
use App\Models\User;
use App\Repositories\UserRepository;

use Date;
use DB;
use Password;

class UsersController extends Controller
{

    private $users;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $report = $this->getUsersReport();

        $base = $this->getBaseFilters();
        $search = $request->has('filters');
        $filters = ($search) ? $request->get('filters') : [];

        return view('dashboard.users.index')->with([
            'users' => $this->search($filters),
            'report' => $report,
            'base' => $base,
            'search' => $search,
            'filters' => $filters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('dashboard.users.create', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\Dashboard\Users\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $params = $request->all();

        $user = new User;
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);

        $this->users->saveProfile($params, $user);

        return redirect()
            ->route('dashboard.users.edit', $user->id)
            ->with('success', 'El usuario se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        return view('dashboard.users.show')->withUser($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user_education = ($user->hasMeta('blog', 'education')) ? $user->getMeta('blog', 'education') : [];
        $user_profession = ($user->hasMeta('blog', 'profession')) ? $user->getMeta('blog', 'profession') : [];

        return view('dashboard.users.edit')->with([
            'user' => $user,
            'education' => $user_education,
            'profession' => $user_profession,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int|string  $id
     * @param  int|string  $section
     * @param  \App\Http\Requests\Dashboard\Users\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, $section, UpdateRequest $request)
    {
        $user = User::find($id);
        $params = $request->all();

        $redirect_url = route('dashboard.users.edit', $user->id);
        $redirect = redirect($redirect_url . '#' . $section);

        switch ($section) {
            case 'general':
                $user->email = $params['email'];
                $this->users->saveProfile($params, $user);
                return $redirect->with('success', 'Se guardaron los cambios correctamente');

            case 'profile':
                $params['premium'] = array_has($params, 'premium') && array_get($params, 'premium') ? 1 : 0;
                $this->users->saveMeta('blog', $params, $user);
                return $redirect->with('success', 'Se guardaron los cambios correctamente');

            case 'banking':
                $this->users->saveMeta('blog', $params, $user);
                return $redirect->with('success', 'Se guardaron los cambios correctamente');

            default:
                return $redirect;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $user_id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'Usuario desactivado exitosamente');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int|string $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($user_id)
    {
        $user = User::withTrashed()->findOrFail($user_id);
        $user->restore();

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', 'Usuario reactivado exitosamente');
    }

        /**
     * Archive for the trashed elements.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $users = User::onlyTrashed()->latest('published_at')->get();

        return view('dashboard.users.trashed')->withUsers($users);
    }

    /**
     * Send reset password to user
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset($id)
    {
        $user = User::findOrFail($id);
        $response = Password::sendResetLink(['email' => $user->email]);

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('success', 'Se envió un mail al usuario para restablecer la contraseña');

            case Password::INVALID_USER:
            default:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
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
        return [
            'limit' => [
                '10' => '10',
                '20' => '20',
                '50' => '50',
                '100' => '100'
            ],
            'order' => [
                'desc' => 'Nuevos primero',
                'asc' => 'Antiguos primero'
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
        $users = User::withTrashed();

        if (array_has($filters, 'name') && $filters['name'] && strlen($filters['name']) >= 3) {
            $name_filter = '%'.$filters['name'].'%';
            $users = $users->where(DB::raw('CONCAT(name, " ", IFNULL(last_name,""))'), 'like', $name_filter);
        }

        if (array_has($filters, 'email') && $filters['email'] && strlen($filters['email']) >= 3) {
            $email_filter = '%'.$filters['email'].'%';
            $users = $users->where('email', 'like', $email_filter);
        }

        $order = 'desc';
        if (array_has($filters, 'order') && $filters['order']) {
            $order = $filters['order'];
            $order = ($order === 'asc') ? 'asc' : 'desc';
        }
        $users = $users->orderBy('created_at', $order);

        $pagination = (array_has($filters, 'limit') && is_numeric($filters['limit'])) ? Filter::setPagination($filters['limit'], 10) : 10;
        $users = $users->paginate($pagination);
        $users->appends(['filters' => $filters]);

        return $users;
    }

    /**
     * Generate users basic report
     */
    private function getUsersReport()
    {
        $since = (new Date('first day of this month'))->hour(0)->minute(0)->second(0);

        $current = $this->getUsersSummary($since->copy()->addMonth(), $since);
        $past = $this->getUsersSummary($since, $since->copy()->subMonth());

        return [
            'new' => [
                'current' => $current['new'],
                'past' => $past['new'],
                'difference' => $current['new'] - $past['new'],
                'percentage' => ($past['new']) ? (int) (($current['new'] * 100) / $past['new']) : 0
            ],
            'cancelled' => [
                'current' => $current['cancelled'],
                'past' => $past['cancelled'],
                'difference' => $current['cancelled'] - $past['cancelled'],
                'percentage' => ($past['cancelled']) ? (int) (($current['cancelled'] * 100) / $past['cancelled']) : 0
            ]
        ];
    }


    /**
     * @param  Date  $until
     * @param  Date  $since
     * @return \Illuminate\Support\Collection
     */
    private function getUsersSummary(Date $until = null, Date $since = null)
    {
        $range = $this->toDateRange($since, $until);

        $new = DB::table('users')
            ->whereBetween('created_at', $range)
            ->count();

        $cancelled = DB::table('users')
            ->whereBetween('deleted_at', $range)
            ->count();

        return compact('new', 'cancelled');
    }

    /**
     * @param  Date|null  $since
     * @param  Date|null  $until
     * @return array
     */
    private function toDateRange(?Date $since = null, ?Date $until = null)
    {
        return [
            $since ?: Date::parse('2017-01-01'),
            $until ?: Date::now(),
        ];
    }

}
