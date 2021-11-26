<?php

namespace App\Traits;

trait AdminActions
{
    public function before($user, $ability) // Allow all actions to admin user
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
