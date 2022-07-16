<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        Response::macro('success', function ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        });

        Response::macro('error', function ($error = null, $status_code = 400) {
            $__responseMsg = [
                '200' => 'The request was successfully completed',  // Ok
                '201' => 'A new resource was successfully created', // Created
                '400' => 'The request was invalid',     // Bad request
                '401' => 'Invalid login credentials',   // Unauthorized
                '403' => 'You do not have permission',   // Forbidden
                '404' => 'Object not found',    // Not Found
                '405' => 'Method is not allowed',  // Method Not Allowed
                '409' => 'The request could not be completed due to conflict',  // Conflict
                '500' => 'Internal Server Error',   // Internal Server Error
                '503' => 'The server was unavailable'   // Service Unavailable
            ];
            $status_code = array_key_exists($status_code, $__responseMsg) ? $status_code : 400;
            $message = is_null($error) ? $__responseMsg[$status_code] : $error;

            return response()->json([
                'success' => false,
                'message' => $message,
                'error' => $status_code
            ], $status_code);
        });
    }
}
