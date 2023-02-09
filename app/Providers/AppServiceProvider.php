<?php

namespace App\Providers;
use App\Providers\Validators\CedulaValidator;
use Illuminate\Support\Facades\Validator;
use App\Rules\EcuadorianID;
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
        $this->app->singleton(CedulaValidator::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('ecuadorian_id', function ($attribute, $value, $parameters, $validator) {
            return (new EcuadorianID)->passes($attribute, $value);
        });
    }
}
