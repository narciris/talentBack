<?php

namespace Src\Domain\Repositories;

interface PermissionRepositoryInterface
{
    public function findByUserId(int $userId, string $permissionName);

}
