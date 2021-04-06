<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminAccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function registerBindings()
    {
        $repos = [
            'UserGroup',
            'PermissionGroup',
            'Permission',
            'Role',
            'Auth',
            'Dashboard',
            'AdminUser',
            'Gym',
            'GymAdmin',
            'WorkoutBodyParts',
            'WorkoutItem',
            'ProductModel',
            'Product',
            'Brand',
            'Category',
            'SubCategory',
            'City',
            'Area',
            'Customer',
            'Faq',
            'ProductType',
            'Package',
            'Promotion'
        ];

        foreach ($repos as $repo) {
            $this->app->bind("App\Repositories\Admin\\{$repo}\\{$repo}Interface", "App\Repositories\Admin\\{$repo}\\{$repo}Abstract");
        }
    }

}
