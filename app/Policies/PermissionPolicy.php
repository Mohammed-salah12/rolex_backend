<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
            return auth()->user()->hasPermissionTo('index-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('index-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('index-permission')
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
            return auth()->user()->hasPermissionTo('create-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('create-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('create-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('edit-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('edit-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('edit-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('delete-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('delete-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('delete-permission')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }
}
