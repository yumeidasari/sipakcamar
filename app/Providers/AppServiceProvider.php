<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        \Schema::defaultStringLength(191);
		
		config(['app.locale' => 'id']);
		\Carbon\Carbon::setLocale('id');

        //$this->registerPolicies();
        //untuk authorize yg bisa mengakses
        \Gate::define('kelola-kategori', function($user){
                return $user->role == 'ADMINISTRATOR';
        });

        \Gate::define('kelola-satker', function($user){
            return $user->role == 'OPERATOR';
    });
    }
}
