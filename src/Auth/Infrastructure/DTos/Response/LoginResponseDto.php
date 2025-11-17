<?php

namespace Src\Auth\Infrastructure\DTos\Response;

class LoginResponseDto
{

    public UserResponseDto $user;
    public string $token;

    public function __construct(UserResponseDto $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function getUser(): UserResponseDto{
        return $this->user;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'user' => $this->user,
        ];

    }


}
