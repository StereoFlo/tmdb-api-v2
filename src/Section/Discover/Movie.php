<?php

namespace TMDB\Section\Discover;

use TMDB\Section\AbstractSection;

/**
 * Class Movie
 * @see for query params https://developers.themoviedb.org/3/discover/movie-discover
 *
 * @package TMDB\Section\Discover
 */
class Movie extends AbstractSection
{
    protected $path = '/discover/movie';
}
