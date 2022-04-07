<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return User::paginate();
    }


    /**
     * @return User
     */
    public static function store($arrayUser): User
    {
        return User::create($arrayUser);
    }

    /**
     * @return bool
     */
    public static function update($arrayUser, $user): bool
    {
        return $user->update($arrayUser);
    }

}
