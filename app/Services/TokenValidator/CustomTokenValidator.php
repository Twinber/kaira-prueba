<?php

namespace App\Services\TokenValidator;

class CustomTokenValidator implements TokenValidatorInterface
{
    public function validateToken(?string $token): bool
    {
        if ($token === null) {
            return false;
        }
        if ($token === '') {
            return true;
        }

        return $this->isValidCharSequence($token);
    }

    private function isValidCharSequence(string $token): bool
    {
        $stack = [];
        $map = [
            ')' => '(',
            ']' => '[',
            '}' => '{',
        ];
        for ($i = 0; $i < strlen($token); $i++) {
            $char = $token[$i];
            $isClosingChar = array_key_exists($char, $map);
            if ($isClosingChar) {
                $lastChar = empty($stack) ? '#' : array_pop($stack);
                $openingChar = $map[$char];
                if ($lastChar != $openingChar) {
                    return false;
                }
            } else {
                $stack[] = $char;
            }
        }

        return empty($stack);
    }
}
