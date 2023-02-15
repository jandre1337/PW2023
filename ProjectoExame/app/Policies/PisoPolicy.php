<?php

namespace App\Policies;


use App\Models\User;
use App\Models\Piso;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PisoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return auth()->user()->gestor == 1
            ? Response::allow()
            : Response::deny('Não tem permissões para aceder aos contratos.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Contract $contract)
    {
        return auth()->user()->gestor == 1
            ? Response::allow()
            : Response::deny('Não tem permissões para aceder ao contrato.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return auth()->user()->gestor == 1
            ? Response::allow()
            : Response::deny('Não tem permissões para aceder ao contrato.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return auth()->user()->gestor == 1
                ? Response::allow()
                : Response::deny('Não tem permissões para aceder aos clientes.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        return auth()->user()->gestor == 1
            ? Response::allow()
            : Response::deny('Não tem permissões para aceder aos contratos.');
    }



}
