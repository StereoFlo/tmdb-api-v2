<?php

namespace TMDB\Section;

/**
 * Class AbstractSection
 *
 * @package TMDB\Section
 */
abstract class AbstractSection
{
    /**
     * @var string
     */
    protected $method = 'GET';

    /**
     * @var string
     */
    protected $path = '';

    /**
     * @var array
     */
    protected $pathParams = [];

    /**
     * @var array
     */
    protected $query = [];

    /**
     * AbstractSection constructor.
     *
     * @param string|null $path
     * @param string[]|null $pathParams
     * @param array $query
     */
    public function __construct(string $path = null, array $pathParams = [], array $query = [])
    {
        if ($path) {
            $this->path = $path;
        }
        if ($pathParams) {
            $this->pathParams = $pathParams;
        }
        if ($query) {
            $this->query = $query;
        }
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getPathParams(): array
    {
        return $this->pathParams;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}
