<?php

namespace Src\Infrastructure\EloquentRepositories;

use Illuminate\Support\Facades\DB;
use Src\Domain\Repositories\PermissionRepositoryInterface;

class EloquentPermissionRepository implements PermissionRepositoryInterface
{

    public function findByUserId(int $userId, string $permissionName)
    {
        DB::table('user_permissions')
            ->where('user_id', $userId)
            ->where('permission_name', $permissionName)
            ->first();

    }
}
