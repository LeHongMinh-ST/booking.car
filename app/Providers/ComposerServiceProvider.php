<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(
            'client.includes.header',
            'App\Http\View\MenuViewComposer'
        );

        view()->composer(
            'client.includes.sidebar',
            'App\Http\View\SideBarViewComposer'
        );
    }
}
