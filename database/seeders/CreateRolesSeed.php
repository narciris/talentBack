<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $adminPermission =
            [
                'post.show',
                'post.create',
                'post.edit',
                'post.delete',
                'post.shared',
                'post.restore',
                'comment.create',
                'comment.edit',
                'comment.delete',
                'comment.restore',
                'users.show',
                'users.create',
                'users.edit',
                'users.delete',
        ];

        $employeePermission = [
            'comment.create',
            'comment.edit',
            'comment.delete',
            'post.shared',
            'post.create',
            'post.edit',
            'post.delete',
        ];

        $allPermissions = array_unique(array_merge($adminPermission, $employeePermission));

        foreach ($allPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // === ROLES ===
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $employee = Role::firstOrCreate(['name' => 'employee']);

        // === ASIGNAR PERMISOS ===
        $admin->givePermissionTo($adminPermission);
        $employee->givePermissionTo($employeePermission);
    }
}
