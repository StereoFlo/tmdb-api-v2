<?php

namespace TMDB\Section\Discover;

use TMDB\Section\AbstractSection;

/**
 * Class Tv
 * @see for query params https://developers.themoviedb.org/3/discover/tv-discover
 *
 * @package TMDB\Section\Discover
 */
class Tv extends AbstractSection
{
    protected $path = '/discover/tv';
}
