<?php

namespace App\Http\Requests;

use App\Services\TokenValidator\TokenValidatorInterface;
use Illuminate\Foundation\Http\FormRequest;

class ShortenUrlPostRequest extends FormRequest
{
    public function __construct(protected TokenValidatorInterface $tokenValidator)
    {
        parent::__construct();
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $token = $this->bearerToken();

        return $this->tokenValidator->validateToken($token);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array{url: string}
     */
    public function rules(): array
    {
        return [
            'url' => 'required|url',
        ];
    }
}
