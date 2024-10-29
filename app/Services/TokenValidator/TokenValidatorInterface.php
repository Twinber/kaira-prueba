<?php

namespace App\Services\TokenValidator;

interface TokenValidatorInterface
{
    /**
     * @param ?string $token
     * @return bool
     */
    public function validateToken(?string $token): bool;
}
