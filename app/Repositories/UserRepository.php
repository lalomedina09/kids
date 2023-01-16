<?php

namespace App\Repositories;

use \Illuminate\Http\UploadedFile;

use App\Helpers\Filter;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\User;

use DB;

class UserRepository
{
    /**
     * Save user interests
     *
     * @param  array  $params
     * @param  \App\Models\User  $user
     * @return \App\Models\User
     */
    public function saveInterests($params, User $user) : User
    {
        $user->interests()->sync($params['interests']);
        $user->save();
        return $user;
    }

    /**
     * Save user password
     *
     * @param  array  $params
     * @param  \App\Models\User  $user
     * @return \App\Models\User
     */
    public function savePassword($params, User $user) : User
    {
        $user->password = bcrypt($params['password']);
        $user->save();
        return $user;
    }

    /**
     * Save user profile
     *
     * @param  array  $params
     * @param  \App\Models\User  $user
     * @return \App\Models\User
     */
    public function saveProfile($params, User $user) : User
    {
		$profile_photo_checked = $params['profile_photo_checked'];

        $user->name = $params['name'];
        $user->last_name = array_has($params, 'last_name') ? $params['last_name'] : null;

        if ($user->isDirty()) {
            $user->save();
        }

		if (is_null($profile_photo_checked)) {
			if (array_has($params, 'profile_photo')
				&& $params['profile_photo'] instanceof UploadedFile
				&& $file = $params['profile_photo']) {
				$user->saveProfilePhoto($file);
			}
		} else {
			$temp = tempnam(sys_get_temp_dir(), 'php');
			file_put_contents($temp, file_get_contents($profile_photo_checked));
			$file = new UploadedFile($temp, basename($profile_photo_checked));
			$user->saveProfilePhoto($file);
		}

        $this->saveMeta('blog', $params, $user);

        return $user;
    }

    /**
     * Save user metadata
     *
     * @param  string  $metascope
     * @param  array  $params
     * @param  \App\Models\User  $user
     * @return \App\Models\User
     */
    public function saveMeta($metascope, $params, User $user) : User
    {
        foreach ($params as $metakey => $metavalue) {
            $user->setMeta($metascope, $metakey, $metavalue);
        }
        return $user;
    }

    /**
     * Search users
     *
     * @param  array  $input
     * @return \Illuminate\Support\Collection;
     */
    public function search($input) {
        $results = new \Illuminate\Support\Collection();

        if (array_has($input, 'q') && $input['q']) {
            $key = (array_has($input, 'key') && $input['key']) ? $input['key'] : 'name';
            $key = (in_array($key, ['name', 'email'])) ? $key : 'name';
            $key = ($key === 'name') ? DB::raw('CONCAT(name, " ", IFNULL(last_name,""))') : $key;
            $q = '%'.$input['q'].'%';

            $search = User::select(['id', 'name', 'last_name', 'email'])
                ->without('metadata')
                ->where($key, 'like', $q);

            $pagination = (array_has($input, 'p') && is_numeric($input['p'])) ? Filter::setPagination($input['p'], 24) : 24;
            $results = $search->paginate($pagination);
        }

        return $results;
    }
}
