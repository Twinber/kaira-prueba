<?php

namespace App\UseCases;

use App\Services\UrlShortener\UrlShortenerInterface;

readonly class UrlShortenerUseCase
{

    public function __construct(private UrlShortenerInterface $urlShortener)
    {

    }

    /**
     * @throws \Exception
     */
    public function shortenUrl(string $url): string
    {
        return $this->urlShortener->shortenUrl($url);
    }
}
