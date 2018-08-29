<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Composers\AnnouncementComposer;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AnnouncementComposer::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
