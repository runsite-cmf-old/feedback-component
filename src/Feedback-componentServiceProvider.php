<?php

namespace Runsite\CMF\Component\Feedback;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class FeedbackComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('feedback-component', \Runsite\CMF\Component\Feedback\Middleware\Feedback-componentMiddleware::class);

        $this->publishes([
            __DIR__.'/Config/feedback-component.php' => config_path('feedback-component.php'),
        ], 'feedback-component_config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'feedback-component');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/feedback-component'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/Views', 'feedback-component');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/feedback-component'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/feedback-component'),
        ], 'feedback-component_assets');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Runsite\CMF\Component\Feedback\Commands\Feedback-componentCommand::class,
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
        $this->mergeConfigFrom(
            __DIR__ . '/Config/feedback-component.php', 'feedback-component'
        );
    }
}
