<?php

namespace App\Providers;

use Illuminate\Http\Response;
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
        Response::macro('customResponse', function($statusCode=null, $message='', $data=[]){
            return response()->json([
                'statusCode' => $statusCode,
                'message'    => $message,
                'data'       => $data
            ]);
        });
    }
}
