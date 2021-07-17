<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// SSL化のため追加
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // SSL化のため引数を追加
    public function boot(UrlGenerator $url)
    {
        \Schema::defaultStringLength(191);
        // SSL化のため追加
        $url->forceScheme('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
