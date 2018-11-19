<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        /* Set default locale for intl php functions */
        Locale::setDefault(config('app.time-locale'));

        /* Set default php locale for dates */
        setlocale(LC_TIME, config('app.time-locale'), config('app.time-locale') . '.utf-8',  config('app.time-locale') . '.utf-8', 'portuguese');

        /* Set default locale to Carbon objects */
        \Carbon\Carbon::setLocale(config('app.time-locale'));
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
