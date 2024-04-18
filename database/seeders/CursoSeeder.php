<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    //Un curso tiene grados de 1 a 6, paralelos de A a B, gestion entero 2024, nivel primaria y secundaria (Ya estan creados en la tabla nivels en base de datos)
    public function run(): void
    {
        $grados = range(1, 6);
        $paralelos = ['A', 'B'];
        $gestion = 2024;
        // $niveles = [1, 2];
        $niveles = [1]; //Solo primaria

        foreach ($grados as $grado) {
            foreach ($paralelos as $paralelo) {
                foreach ($niveles as $nivel) {
                    $curso = Curso::create([
                    'grado' => $grado,
                    'paralelo' => $paralelo,
                    'gestion' => $gestion,
                    'nivel_id' => $nivel
                    ]);

                    $user = User::factory()->create([
                        'role_id' => 2, //Profesor
                    ]);
            
                    $profesor = Profesor::create([
                        'user_id' => $user->id,
                    ]);

                    $profesor->cursos()->attach($curso);

                    //Solo primaria = break, eliminar break para tener secundaria
                    break; // Add this line to create only 1 curso with 1 paralelo and 1 nivel
                }
            }
        }
    }
}
