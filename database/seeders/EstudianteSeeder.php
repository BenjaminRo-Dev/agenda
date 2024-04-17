<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $cursos = Curso::all();
        $materias = Materia::all();

        for ($i = 0; $i < 20; $i++) {
            $user = User::factory()->create([
                'role_id' => 3, //Estudiante
            ]);
    
            $estudiante = Estudiante::create([
                'user_id' => $user->id,
            ]);
            //Insertar datos de la tabla intermedia curso_estudiante:
            $curso = $cursos->random();
            $estudiante->cursos()->attach($curso);
            //Insertar datos de la tabla intermedia estudiante_materia:
            $materiasEstudiante = $materias->where('grado', $curso->grado)->where('paralelo', $curso->paralelo);
            $estudiante->materias()->attach($materiasEstudiante);
        }

    }
}
