<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // Share settings and contact info with all views
        view()->composer('*', function ($view) {
            $settings = \App\Models\Setting::all()->keyBy('key');
            $contactInfo = \App\Models\ContactInfo::ordered()->get()->keyBy('key');
            
            $view->with('globalSettings', $settings);
            $view->with('globalContactInfo', $contactInfo);
        });
    }
}
