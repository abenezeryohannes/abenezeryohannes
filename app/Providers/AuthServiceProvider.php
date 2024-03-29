<?php

namespace App\Providers;

//use Laravel\Passport\Passport;
use App\Firebase\Guard as FirebaseGuard;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Passport::routes();
        //

        
        Auth::viaRequest('firebase', function ($request) {
            return app(FirebaseGuard::class)->user($request);
        });
    }
}
