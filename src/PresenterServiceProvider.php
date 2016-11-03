<?php

namespace TaylorNetwork\Presenter;

use Illuminate\Support\ServiceProvider;

class PresenterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/presenter.php' => config_path('presenter.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Commands\PresenterMakeCommand::class,
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/config/presenter.php', 'presenter'
        );
    }
}