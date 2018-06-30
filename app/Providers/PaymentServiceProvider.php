<?php

namespace App\Providers;

use App\Contracts\PaymentContract;
use App\Exceptions\PaymentMethodNotAllowed;
use App\Services\VisaPaymentService;
use Illuminate\Support\ServiceProvider;
use Prophecy\Exception\Doubler\MethodNotFoundException;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentContract::class, function(){
            $class = 'App\\Services\\' . request()->paymentType . 'PaymentService';
            if (!class_exists($class)) throw new PaymentMethodNotAllowed();
            return new $class();
        });
    }
}
