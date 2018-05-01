<?php

namespace App\Providers;

use App\Phone\TwilioPhone;
use App\Phone\PhoneInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwilioPhone::class, function () {
            $config = config('services.twilio');

            return new TwilioPhone($config['account_sid'], $config['auth_token']);
        });

        $this->app->bind(PhoneInterface::class, TwilioPhone::class);
    }
}
