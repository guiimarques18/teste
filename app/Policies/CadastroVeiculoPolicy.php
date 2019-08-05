<?php

namespace FederalSt\Policies;

use FederalSt\User;
use FederalSt\Veiculos\CadastroVeiculo;
use Illuminate\Auth\Access\HandlesAuthorization;

class CadastroVeiculoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cadastro veiculo.
     *
     * @param  \FederalSt\User  $user
     * @param  \FederalSt\CadastroVeiculo  $cadastroVeiculo
     * @return mixed
     */
    public function view(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
        $role = $user->role;
        $role = explode(',', $role);
        if (in_array('2', $role)) //administrador
            return TRUE;
        if (in_array('1', $role)) //user
            return TRUE;
    }

    /**
     * Determine whether the user can create cadastro veiculos.
     *
     * @param  \FederalSt\User  $user
     * @return mixed
     */
    public function create(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
        $role = $user->role;
        $role = explode(',', $role);
        if (in_array('2', $role)) //administrador
            return TRUE;
    }

    /**
     * Determine whether the user can edit the cadastro veiculo.
     *
     * @param  \FederalSt\User  $user
     * @param  \FederalSt\CadastroVeiculo  $cadastroVeiculo
     * @return mixed
     */
    public function edit(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
        $role = $user->role;
        $role = explode(',', $role);
        if (in_array('2', $role)) //administrador
            return TRUE;
    }

    /**
     * Determine whether the user can update the cadastro veiculo.
     *
     * @param  \FederalSt\User  $user
     * @param  \FederalSt\CadastroVeiculo  $cadastroVeiculo
     * @return mixed
     */
    public function update(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
        $role = $user->role;
        $role = explode(',', $role);
        if (in_array('2', $role)) //administrador
            return TRUE;
    }

    /**
     * Determine whether the user can delete the cadastro veiculo.
     *
     * @param  \FederalSt\User  $user
     * @param  \FederalSt\CadastroVeiculo  $cadastroVeiculo
     * @return mixed
     */
    public function delete(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
        $role = $user->role;
        $role = explode(',', $role);
        if (in_array('2', $role)) //administrador
            return TRUE;
    }

    /**
     * Determine whether the user can restore the cadastro veiculo.
     *
     * @param  \FederalSt\User  $user
     * @param  \FederalSt\CadastroVeiculo  $cadastroVeiculo
     * @return mixed
     */
    public function restore(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the cadastro veiculo.
     *
     * @param  \FederalSt\User  $user
     * @param  \FederalSt\CadastroVeiculo  $cadastroVeiculo
     * @return mixed
     */
    public function forceDelete(User $user, CadastroVeiculo $cadastroVeiculo)
    {
        //
    }
}
