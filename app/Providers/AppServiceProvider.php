<?php

namespace App\Providers;
//importando o view para que a informação definida na fução boot seja carregada em todas as views
use Illuminate\Support\Facades\View;

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
        //informação que irá aprecer nas view
        View::Share('versao','1.0');
    }
}
