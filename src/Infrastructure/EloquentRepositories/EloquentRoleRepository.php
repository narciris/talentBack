<?php

namespace Src\Infrastructure\EloquentRepositories;

use Src\Domain\Entities\RoleEntity;
use Src\Domain\Repositories\RoleRepositoryInterface;

class EloquentRoleRepository  implements RoleRepositoryInterface
{


    public function findByName(string $name): RoleEntity
    {

    }
}
