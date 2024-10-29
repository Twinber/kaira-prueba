<?php

namespace Tests\Data;

class TokenProvider
{
    /**
     * A list of valid tokens.
     * @return string[]
     */
    public static function validTokens(): array
    {
        return [
            '()',
            '[]',
            '{}',
            '{}[]()',
            '{([])}',
            '[{()}]',

        ];
    }

    /**
     * A list of invalid tokens.
     *
     * @return string[]
     */
    public static function invalidTokens(): array
    {
        return [
            '(',
            '[',
            '{',
            ')',
            ']',
            '}',
            '{)',
            '(((((((()',
            '{[}',
            '[abc]',
        ];
    }
}
