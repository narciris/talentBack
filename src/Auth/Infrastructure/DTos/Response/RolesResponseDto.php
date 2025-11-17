<?php

namespace Src\Auth\Infrastructure\DTos\Response;

class RolesResponseDto
{
    public int $id;
    public string $name;
    /** @Var PermissionsResponseDto[]|null*/
    public array $permissions;

    public function __construct(int $id,string $name,array $permissions)
    {
        $this->id = $id;
        $this->name = $name;
        $this->permissions = $permissions;
    }

    public static function fromModel($roles):self
    {
        $permissions = $roles->permissions ? $roles->permissions->map(fn($rol) => PermissionsResponseDto::fromModel($rol))->all() : [];

        return  new self (
            id: $roles->id,
            name: $roles->name,
            permissions: $permissions
        );
    }

    public  function toArray():array
    {
        return [
            'name' => $this->name,
            'id' => $this->id,
            'permissions' =>  $this->permissions ? array_map(fn($permission) => $permission->toArray(),$this->permissions) : [],
        ];
    }

}
