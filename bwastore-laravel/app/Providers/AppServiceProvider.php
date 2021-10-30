<?php

namespace App\Providers;

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
        $this->app->extend(\Sentry\ClientBuilderInterface::class, function (\Sentry\ClientBuilderInterface $builder) {
    $builder->setLogger(new class extends \Psr\Log\AbstractLogger {
        public function log($level, $message, array $context = [])
        {
            error_log("[sentry-laravel] {$level}: {$message} | " . json_encode($context));
        }
    });

    return $builder;
});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
