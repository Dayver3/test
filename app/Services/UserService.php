<?php

namespace App\Services;

use App\Contracts\UserServiceContract;
use App\Models\User;

/**
 *
 */
class UserService implements UserServiceContract
{

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        User::create($data);
        return $data;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function delete($data)
    {
        User::where('user_id', $data['user_id'])->delete();
        return $data;
    }

    /**
     * @param $data
     * @param $user
     * @return mixed
     */
    public function update($data, $user)
    {
        $user->update($data);
        return $data;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return User::all();
    }

}
