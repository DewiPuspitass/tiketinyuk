<?php

// app/Auth/StaffAuthProvider.php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use App\Auth\StaffAuthGuard;
use App\Auth\StaffAuthProvider;

class StaffAuthProvider extends EloquentUserProvider
{

    public function boot()
    {
        $this->registerPolicies();

        $this->app['auth']->extend('staff', function ($app, $name, array $config) {
            return new StaffAuthGuard(
                $name,
                Auth::createUserProvider($config['provider'] ?? null),
                $app->make('session.store')
            );
        });

        Auth::provider('staffAcc', function ($app, array $config) {
            return new StaffAuthProvider($app->make('hash'), $config['model']);
        });
    }
}

?>