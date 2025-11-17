<?php

namespace Src\Auth\Domain\Entities;

use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;

class UserEntity
{

    private int $id;
    private Username $username;
    private  Password $password;
    private string $email;


    public function __construct(int $id,
                                Username $username,
                                Password $password,
                                string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;

    }

    public function getId(): int{
        return $this->id;
    }

    public function getUsername(): Username{
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

}
