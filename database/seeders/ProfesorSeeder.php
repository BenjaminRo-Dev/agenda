<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Materia;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    
    public function run(): void
    {
        
            $user1 = User::factory()->create([
                'role_id' => 2, //Profesor
            ]);
    
            $profesor1 = Profesor::create([
                'user_id' => $user1->id,
            ]);
            //El profesor de valores esta en todos los cursos:
            $cursos = Curso::all();
            $profesor1->cursos()->attach($cursos);
            //El profesor de valores lleva la materia de valores:
            $profesor1->materias()->attach(Materia::where('nombre', 'Valores')->get());

            $user2 = User::factory()->create([
                'role_id' => 2, //Profesor
            ]);

            $profesor2 = Profesor::create([
                'user_id' => $user2->id,
            ]);
            //El profesor de musica esta en todos los cursos:
            $profesor2->cursos()->attach($cursos);
            //El profesor de musica lleva la materia de musica:
            $profesor2->materias()->attach(Materia::where('nombre', 'Musica')->get());

            $user3 = User::factory()->create([
                'role_id' => 2, //Profesor
            ]);

            $profesor3 = Profesor::create([
                'user_id' => $user3->id,
            ]);
            //El profesor de educacion fisica esta en todos los cursos:
            $profesor3->cursos()->attach($cursos);
            //El profesor de educacion fisica lleva la materia de educacion fisica:
            $profesor3->materias()->attach(Materia::where('nombre', 'Educacion Fisica')->get());
        
    }
}
