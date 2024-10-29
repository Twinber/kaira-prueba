<?php

namespace Services\UrlShortener;

use App\Services\TokenValidator\CustomTokenValidator;
use PHPUnit\Framework\TestCase;
use Tests\Data\TokenProvider;

class CustomTokenValidatorTest extends TestCase
{
    public function test_validates_valid_tokens(): void
    {
        $validator = new CustomTokenValidator();
        foreach (TokenProvider::validTokens() as $token) {
            $this->assertTrue($validator->validateToken($token));
        }
    }

    public function test_invalidates_invalid_Tokens(): void
    {
        $validator = new CustomTokenValidator();
        foreach (TokenProvider::invalidTokens() as $token) {
            $this->assertFalse($validator->validateToken($token));
        }
    }
}
