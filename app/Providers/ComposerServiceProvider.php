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
        view()->composer('frontend.sikka.sidebarpostdetail', NavigationComposer::class);
        
        // disini diisikan service helper filter category dipindah ke NavigationComposer agar lebih rapih
        
    }
}
