<?php

namespace App\BO;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BO\Traits\UserTrait;
use App\Models\User;

class UserBO
{
    use UserTrait;

    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return UserRepository::index();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\UserRequest  $request
     * @return User
     */
    public function store($request): User
    {
        $preparedData = $this->prepare($request);
        return UserRepository::store($preparedData);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\UserRequest  $request
     * @param \App\Models\User  $user
     * @return bool
     */
    public function update($request, $user): bool
    {
        $preparedData = $this->prepare($request);
        return UserRepository::update($preparedData, $user);
    }
}
