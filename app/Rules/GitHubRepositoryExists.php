<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class GitHubRepositoryExists implements ValidationRule
{
    /**
     * Determine if the validation rule passes.
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        // Отправляем GET запрос к GitHub API для проверки существования репозитория
        $response = Http::withBasicAuth('token', config('services.github.token'))
            ->get("https://api.github.com/repos/{$value}");

        if (! $response->ok()) {
            $fail('The repository does not exist on GitHub.');
        }
    }
}
