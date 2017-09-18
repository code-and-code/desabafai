<?php

namespace desabafai\core\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'desabafai\core\\Model' => 'desabafai\core\\Policies\ModelPolicy',
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

        Gate::define('authorize', function ($user, $model) {
            dd($model);
            return $user->id == $model->user_id;
        });

        Gate::define('authorize-user', function ($user, $model) {
            return $user->id == $model->id;
        });
    }
}
