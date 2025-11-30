<?php

namespace Src\Domain\Repositories;

use Src\Domain\Entities\RoleEntity;

interface RoleRepositoryInterface
{
    public function findByName(string $name):RoleEntity;

}
