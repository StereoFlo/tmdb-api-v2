<?php

namespace TMDB;

use Symfony\Component\HttpClient\HttpClient;
use Throwable;
use TMDB\Exception\EmptyQueryParamException;
use TMDB\Exception\InvalidParamException;
use TMDB\Section\AbstractSection;
use function preg_match;
use function strpos;

/**
 * Class TMDB
 * @package TMDB
 */
class TMDB
{
    const API_URL = 'https://api.themoviedb.org/3';

    /**
     * @var string
     */
    private $language = 'en';

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var AbstractSection
     */
    private $section;

    /**
     * @param string $language
     *
     * @return TMDB
     *
     * @throws InvalidParamException
     */
    public function setLanguage(string $language): self
    {
        if (2 === strlen($language) || 0 < preg_match('/[a-z]{2}-[A-Z]{2}/', $language)) {
            $this->language = $language;

            return $this;
        }
        throw new InvalidParamException('Language must be valid ISO-639-1 standard');
    }

    /**
     * @param Credentials $credentials
     *
     * @return self
     */
    public function setCredentials(Credentials $credentials): self
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * @param AbstractSection $section
     *
     * @return self
     */
    public function setSection(AbstractSection $section): self
    {
        $this->section = $section;

        return $this;
    }

    /**
     * @return array
     *
     * @throws Throwable
     */
    public function get(): array
    {
        $path = $this->section->getPath();
        if (false === strpos($path, '%')) {
            return $this->makeRequest($this->section->getMethod(), self::API_URL . $path, [
                    'api_key' => $this->credentials->getApiKey(),
                    'language' => $this->language,
                ] + $this->section->getQuery());
        }
        if (empty($this->section->getPathParams())) {
            throw new EmptyQueryParamException('the path params is missing');
        }
        return $this->makeRequest($this->section->getMethod(), self::API_URL . vsprintf($this->section->getPath(), $this->section->getPathParams()), [
                'api_key' => $this->credentials->getApiKey(),
                'language' => $this->language,
            ] + $this->section->getQuery());
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $query
     *
     * @return array
     *
     * @throws Throwable
     */
    private function makeRequest(string $method, string $url, array $query): array
    {
        try {
            $response = HttpClient::create()
                ->request($method, $url, [
                        'query' => $query,
                ]);
            return $response->toArray();
        } catch (Throwable $throwable) {
            throw $throwable;
        }
    }
}
