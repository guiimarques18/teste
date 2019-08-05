<?php

namespace FederalSt\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use FederalSt\Veiculos\CadastroVeiculo;
use FederalSt\Policies\CadastroVeiculoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'FederalSt\Model' => 'FederalSt\Policies\ModelPolicy',
        CadastroVeiculo::class => CadastroVeiculoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
