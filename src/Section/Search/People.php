<?php

namespace TMDB\Section\Search;

use TMDB\Section\AbstractSection;

/**
 * Class People
 *
 * @see for details https://developers.themoviedb.org/3/search/search-people
 *
 * @package TMDB\Section\Search
 */
class People extends AbstractSection
{
    protected $path = '/search/person';
}
