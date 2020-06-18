<?php
namespace App\Providers;
use App\User; // write model name here 
use Illuminate\Support\ServiceProvider;
class Ulist extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('userlist', User::all());
        });
    }

}
