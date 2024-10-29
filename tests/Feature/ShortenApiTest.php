<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Tests\Data\TokenProvider;
use Tests\TestCase;

class ShortenApiTest extends TestCase
{
    public function test_shortener_api_with_valid_tokens_successful_response(): void
    {

        foreach (TokenProvider::validTokens() as $token) {
            $response = $this->getShortUrlResponse($token);
            $response->assertStatus(200);
        }

    }

    public function test_shortener_api_with_invalid_tokens_unsuccessful_response(): void
    {

        foreach (TokenProvider::invalidTokens() as $token) {
            $response = $this->getShortUrlResponse($token);
            $response->assertStatus(403);
        }
    }

    /**
     * @param string $token
     * @return TestResponse<Response>
     */
    private function getShortUrlResponse(string $token): TestResponse
    {
        return $this->post('/api/v1/short-urls', [
            'url' => 'https://www.google.com',
        ], ['Authorization' => "Bearer $token"]);
    }
}
