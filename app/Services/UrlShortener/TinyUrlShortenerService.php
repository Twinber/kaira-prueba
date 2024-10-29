<?php

namespace App\Services\UrlShortener;

use Exception;
use Illuminate\Support\Facades\Http;

class TinyUrlShortenerService implements UrlShortenerInterface
{
    private string $API_URL = 'https://tinyurl.com/api-create.php';

    /**
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function shortenUrl(string $url): string
    {
        $response = Http::get($this->API_URL, [
            'url' => $url,
        ]);

        if ($response->failed()) {
            throw new Exception('Failed to shorten the URL');
        }

        return $response->body();
    }
}
