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

        // Super Admin Access
        \Illuminate\Support\Facades\Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        // Define permissions
        $permissions = [
            'edit_partners', 
            'edit_projects', 
            'edit_realizations', 
            'edit_team', 
            'edit_odoo_modules', 
            'edit_settings', 
            'edit_contact_info', 
            'edit_users'
        ];

        foreach ($permissions as $permission) {
            \Illuminate\Support\Facades\Gate::define($permission, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }

        // Share settings and contact info with all views
        view()->composer('*', function ($view) {
            $settings = cache()->remember('global_settings', 3600, function () {
                return \App\Models\Setting::all()->keyBy('key');
            });
            $contactInfo = cache()->remember('global_contact_info', 3600, function () {
                return \App\Models\ContactInfo::ordered()->get()->keyBy('key');
            });
            
            $view->with('globalSettings', $settings);
            $view->with('globalContactInfo', $contactInfo);
        });
    }
}
