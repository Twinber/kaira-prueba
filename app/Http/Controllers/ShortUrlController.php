<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortenUrlPostRequest;
use App\UseCases\UrlShortenerUseCase;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShortUrlController extends Controller
{

    public function __construct(protected UrlShortenerUseCase $urlShortenerUseCase)
    {

    }

    public function __invoke(ShortenUrlPostRequest $request): JsonResponse
    {
        try {
            $shortUrl = $this->urlShortenerUseCase->shortenUrl($request->get('url'));
        } catch (Exception $e) {
            return new JsonResponse([
                'error' => 'Failed to shorten the URL' . $e->getMessage(),
            ], 500);
        }

        return new JsonResponse([
            'url' => $shortUrl,
        ]);
    }
}
