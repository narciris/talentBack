<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AsigRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where('username','nar@example.com');
        $role = Role::where('name','admin')->first();
        //asignar role
        $user->assignRole($role);

    }
}
