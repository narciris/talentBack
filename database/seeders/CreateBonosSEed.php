<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bonos;

class CreateBonosSEed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Bonos::create([
            "name" => "Café Sello Rojo",
            "description" => "Un bono para reclamar una bebida caliente.",
            "tipos" => "bono_redimible",
            "costo_puntos" => 50,
            "habilitada" => true
        ]);

        Bonos::create([
            "name" => "Permiso sin justificar",
            "description" => "Permiso de ausencia no justificada.",
            "tipos" => "permiso_no_justificado",
            "costo_puntos" => 0,
            "habilitada" => true
        ]);

        Bonos::create([
            "name" => "Bono de Almuerzo",
            "description" => "Bono para reclamar un almuerzo en cafetería.",
            "tipos" => "bono_redimible",
            "costo_puntos" => 120,
            "habilitada" => true
        ]);
    }
}
