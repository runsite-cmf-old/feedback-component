<?php

namespace Runsite\Component\Feedback;

use Illuminate\Support\ServiceProvider;
use Runsite\Component\Feedback\Commands\FeedbackComponentCommand;

class FeedbackComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FeedbackComponentCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
