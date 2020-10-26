<?php

namespace DanielChrisLucas\ChuckNorrisJokes\Tests;

use DanielChrisLucas\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use DanielChrisLucas\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorris::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();

        self::assertSame('some joke' . PHP_EOL, $output);
    }
}
