<?php
namespace App\Providers;
use App\Meal; // write model name here 
use Illuminate\Support\ServiceProvider;
class Mlist extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('meallist', Meal::all());
        });
    }

}

