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
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveUsers(): Collection
    {
        return UserRepository::findActiveUsers();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\UserRequest  $request
     * @return User
     */
    public function store($request): User
    {
        return UserRepository::store($this->prepare($request));
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
        return UserRepository::update($this->prepare($request, $user), $user);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\User  $user
     * @return bool
     */
    public function destroy($user): bool
    {
        return UserRepository::destroy($user);
    }
}
