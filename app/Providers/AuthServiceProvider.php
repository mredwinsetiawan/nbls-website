<?php

namespace App\Providers;

// use App\Research;
// use App\Policies\ResearchPolicy;
// use GateContract;

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
        'App\Research' => 'App\Policies\ResearchPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('view-research', function($user, $research){
        //   return $user->id === $research->author_id;
        // });
    }
}
