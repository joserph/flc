<?php

namespace App\Policies;

use App\Models\Logistic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LogisticPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('Ver Empresa de Logistica') || $user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Logistic $logistic): bool
    {
        if($user->hasPermissionTo('Ver Empresa de Logistica') || $user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Crear Empresa de Logistica') || $user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Logistic $logistic): bool
    {
        if($user->hasPermissionTo('Editar Empresa de Logistica') || $user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Logistic $logistic): bool
    {
        if($user->hasPermissionTo('Eliminar Empresa de Logistica') || $user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Logistic $logistic): bool
    {
        if($user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Logistic $logistic): bool
    {
        if($user->hasRole('Super Admin')){
            return true;
        }
        return false;
    }
}
