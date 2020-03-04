<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

	public function update(User $currentUser, User $user)
	{
		return $currentUser->id == $user->id;
    }

	public function destory(User $current, User $user)
	{
		return $current->is_admin && $current->id !== $user->id;
    }

	public function follow(User $current, User $user)
	{
		return $current->id !== $user->id;
    }
}
