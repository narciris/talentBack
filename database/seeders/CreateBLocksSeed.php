<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blocks;

class CreateBLocksSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blocks::create([
            'user_id' => 3,
            'bono_id' => 1,
            'bloqueo_vigente' => true
        ]);
    }
}
