<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot()
    {
        /*$this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('api_token')) {
                return User::where('api_token', $request->input('api_token'))->first();
            }
        });*/

        $this->app['auth']->viaRequest('api', function ($request)
        {
            return \App\User::where('email', $request->input('email'))->first();
        });
    }
}
