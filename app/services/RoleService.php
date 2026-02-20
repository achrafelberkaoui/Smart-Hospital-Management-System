<?php

namespace App\services;

use App\Models\User;

class RoleService{
    public function hasRole(User $user, $roles): bool
    {
        if(is_array($roles)){
            return in_array($user->role, $roles); 
        }
        return $user->role === $roles;
    }
}