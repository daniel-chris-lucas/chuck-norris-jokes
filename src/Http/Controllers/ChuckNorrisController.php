<?php

namespace DanielChrisLucas\ChuckNorrisJokes\Http\Controllers;

use DanielChrisLucas\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return ChuckNorris::getRandomJoke();
    }
}