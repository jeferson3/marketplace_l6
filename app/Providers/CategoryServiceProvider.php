<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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

        ## COMPARTILHAR DADOS EM TODAS AS VIEWS ##

        // $categories = Category::all(['name', 'slug']);
        // view()->composer('*', function($view) use($categories){
        //     $view->with('categories', $categories);
        // });

        view()->composer('template.front', 'App\Http\Views\CategoryViewComposer@compose');
    }
}
