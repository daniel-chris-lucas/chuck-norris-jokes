<?php

namespace DanielChrisLucas\ChuckNorrisJokes;

use DanielChrisLucas\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use DanielChrisLucas\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ]);

        Route::get('chuck-norris', ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });
    }
}
