<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    
    /**
     * Se ejecuta antes que cualquier policy
     */
    public function before($user)
    {
        if($user->hasRole('Admin'))
        {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('View posts');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create posts');
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('Update posts');
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('Delete posts');
    }

    public function restore(User $user, Post $post)
    {
        //
    }

    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
