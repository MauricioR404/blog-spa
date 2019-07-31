<?php

namespace App\Policies;

use App\User;
use App\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Message $message)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('View messages');        
    }
    public function delete(User $user, Message $message)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Delete messages');        
    }
}
