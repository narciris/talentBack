<?php

namespace Src\Auth\Infrastructure\DTos\Response;

use App\Models\User;

class UserResponseDto
{

    public string $username;
    public  string $lastname;
    public string $email;
    public string $nickname;
    public string $name;
    /** @var RolesResponseDto[]|null*/
    public array $roles;

    public function __construct(string $username,
                                string $lastname,
                                string $email,
                                string $nickname,
                                string $name,
                               array $roles
    )
    {
        $this->username = $username;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->name = $name;
        $this->roles = $roles;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'nickname' => $this->nickname,
            'name' => $this->name,
            'roles' => array_map(fn($role) => $role->toArray(), $this->roles),


        ];
    }

      public static function fromModel( $user):self
      {
          $roles = $user->roles ? $user->roles->map(fn($rol) => RolesResponseDto::fromModel($rol))->all() : [];

          return new self(
              $user->username,
              $user->lastname,
              $user->email,
              $user->nickname,
              $user->name,
              $roles
          );
      }
}
