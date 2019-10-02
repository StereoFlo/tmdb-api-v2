<?php

namespace TMDB\Section\Trending;

use TMDB\Section\AbstractSection;

/**
 * Class Trending
 *
 * @package TMDB\Section\Trending
 */
class Trending extends AbstractSection
{
    /**
     * @var string
     */
    protected $path = '/trending/%s/%s';
}
