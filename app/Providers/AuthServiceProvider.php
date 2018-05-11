<?php

namespace App\Providers;

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

         Gate::resource('posts', 'App\Policies\PostPolicy'); 
         // Gate::resource('admins', 'App\Policies\PostPolicy'); 
        Gate::define('posts.tag', 'App\Policies\PostPolicy@tag'); 
        Gate::define('posts.category', 'App\Policies\PostPolicy@category'); 
        Gate::define('posts.publish', 'App\Policies\PostPolicy@publish'); 
        Gate::define('posts.create_admin', 'App\Policies\PostPolicy@create_admin'); 
        Gate::define('posts.edit_admin', 'App\Policies\PostPolicy@edit_admin'); 
        Gate::define('posts.delete_admin', 'App\Policies\PostPolicy@delete_admin'); 
        Gate::define('posts.role_admin', 'App\Policies\PostPolicy@role_admin'); 
    }
}
