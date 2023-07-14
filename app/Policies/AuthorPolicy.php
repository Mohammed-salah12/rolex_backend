<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
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
            return auth()->user()->hasPermissionTo('index-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('index-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('index-author')
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
            return auth()->user()->hasPermissionTo('create-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('create-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('create-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('edit-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('edit-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('edit-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('delete-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('delete-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
        else
        {
            return  auth()->user()->hasPermissionTo('delete-author')
                ?  $this->allow()
                : $this->deny(' you dont have a permission to access this page');
        }
    }


}
