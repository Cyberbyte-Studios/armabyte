<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan([
            'view-self' => 'Can view there own player',
            'view-players' => 'Can view players',
            'edit-players' => 'Can edit players',
            'edit-staff' => 'Can edit staff',
            'rcon' => 'Can issue rcon commands',
        ]);
    }
}
