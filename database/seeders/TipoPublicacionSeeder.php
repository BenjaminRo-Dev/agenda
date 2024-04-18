<?php

namespace Database\Seeders;

use App\Models\TipoPublicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoPublicacion::create([
            'nombre' => 'Evento'
        ]);

        TipoPublicacion::create([
            'nombre' => 'Comunicado'
        ]);
    }
}
