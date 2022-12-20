<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, User $model)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, User $model)
    {
        return ($user->role->name == 'admin');
    }


    public function delete(User $user, User $model)
    {
        //
    }


    public function restore(User $user, User $model)
    {
        //
    }


    public function forceDelete(User $user, User $model)
    {
        //
    }
    public function ban(User $user){
        return ($user->role->name == 'admin');
    }
    public function unban(User $user){
        return ($user->role->name == 'admin');
    }


}
