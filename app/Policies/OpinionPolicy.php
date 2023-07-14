<?php

namespace App\Policies;

use App\Models\Opinion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OpinionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('index-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('index-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('index-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('create-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('create-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('create-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('edit-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('edit-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('edit-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('delete-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('delete-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('delete-opinion')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }
}
