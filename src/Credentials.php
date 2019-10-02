<?php

namespace TMDB;


class Credentials
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * Credentials constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}
