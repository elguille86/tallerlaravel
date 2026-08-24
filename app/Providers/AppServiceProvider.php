<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator; // use usa CCS Bootsstrap

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
        // si quieres que a paginacion tenga los estilo de BootsStrap
        //Paginator::useBootstrap(); // El generico 
        //Paginator::useBootstrapFour(); //por vesion para la version 4
    }
}
