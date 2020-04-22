<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Panggil composer views
use App\Views\Composers\NavigationComposer;

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
        //Panggil navigations composer dari App\Views\Composers 
        //view()->composer('frontend.sikka.sidebarpostdetail', NavigationComposer::class);
        view()->composer('frontend.kz.layouts.sidebar', NavigationComposer::class);
        view()->composer('frontend.kz.layouts.main', NavigationComposer::class);
        
        // disini isi service helper filter category dipindah ke file App\Views\NavigationComposer agar lebih rapih
        
    }
}
