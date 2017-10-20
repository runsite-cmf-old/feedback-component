<?php

namespace Runsite\Component\Feedback;

use Illuminate\Support\ServiceProvider;
use Runsite\Component\Feedback\Commands\Setup\FeedbackComponentSetupCommand;

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
                FeedbackComponentSetupCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/Publish/FeedbackController.php' => app_path('Http/Controllers/FeedbackController.php'),
            __DIR__.'/Publish/SendFeedback.php' => app_path('Mail/SendFeedback.php'),
            __DIR__.'/Publish/mail.blade.php' => resource_path('views/feedback/mail.blade.php'),
            __DIR__.'/Publish/show.blade.php' => resource_path('views/feedback/show.blade.php'),
        ]);
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
