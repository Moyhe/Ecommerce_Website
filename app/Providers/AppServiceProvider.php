<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use \Clockwork\Support\Laravel\ClockworkServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (app()->environment('local')) {
            app()->register(ClockworkServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->email === 'MohyeMahmoud@gmail.com';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });

        if (app()->environment() == 'production') {
            $url->forceScheme('https');
        }
    }
}
