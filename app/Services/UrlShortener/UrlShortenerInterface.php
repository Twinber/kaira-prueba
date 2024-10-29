<?php

namespace App\Services\UrlShortener;

use Exception;

interface UrlShortenerInterface
{
    /**
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function shortenUrl(string $url): string;
}
