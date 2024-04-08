<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{
    
    public function viewAny(User $user): bool
    {
        //
        return $user->rol==2;
    }


    public function view(User $user, Vacante $vacante): bool
    {
        //
    }

  
    public function create(User $user): bool
    {
        return $user->rol==2;
    }

   
    public function update(User $user, Vacante $vacante): bool
    {
        //
        return $user->id === $vacante->user_id;
    }

   
    public function delete(User $user, Vacante $vacante): bool
    {
        //
    }

 
    public function restore(User $user, Vacante $vacante): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacante $vacante): bool
    {
        //
    }
}
