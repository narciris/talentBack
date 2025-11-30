<?php

namespace Src\Domain\Entities;

class RoleEntity
{
    private string $name;
    private int $id;
    private array $permissions;

    public function addPermissions(Permission $permission):void
    {

    }

}
