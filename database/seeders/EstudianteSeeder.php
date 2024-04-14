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
        for ($i = 0; $i < 20; $i++) {
            $user = User::factory()->create([
                'role_id' => 3, //Estudiante
            ]);
    
            Estudiante::create([
                'user_id' => $user->id,
            ]);
        }
        //Insertar datos de la tabla intermedia curso_estudiante:
        //Cada estudiante debe estar en un curso
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        foreach ($estudiantes as $estudiante) {
            $curso = $cursos->random();
            $estudiante->cursos()->attach($curso);
        }

        //Insertar datos de la tabla intermedia estudiante_materia:
        //cada estudiante esta en un curso, el curso tiene un grado, la materia debe tener el mismo grado que el curso del estudiante:

        $materias = Materia::all();
        foreach ($estudiantes as $estudiante) {
            $curso = $estudiante->cursos->first();
            $grado = $curso->grado;
            $materia = $materias->where('grado', $grado)->random(2);
            $estudiante->materias()->attach($materia);
        }
        
        
    }
}
