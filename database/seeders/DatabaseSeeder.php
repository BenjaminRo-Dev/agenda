<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Profesor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            // UserSeeder::class,
            NivelSeeder::class,
            CursoSeeder::class,
            MateriaSeeder::class,
            EstudianteSeeder::class,
            ProfesorSeeder::class,
            TipoPublicacionSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'password' => bcrypt('00000000'), // 8 veces 0
            'email' => 'test@example.com',
            'role_id' => 1 //Administrador
        ]);

        $user1 = User::factory()->create([
            'name' => 'Benjamin Profesor',
            'password' => bcrypt('00000000'), // 8 veces 0
            'email' => 'profe@example.com',
            'role_id' => 2 //Profesor
        ]);

        $profesor = Profesor::create([
            'user_id' => $user1->id,
        ]);

        $curso = Curso::create([
            'grado' => 4,
            'paralelo' => 'A',
            'gestion' => date('Y'),
            'nivel_id' => 2,
            'nombre_completo' => '4 A Secundaria 2024'
        ]);
        
        $profesor->cursos()->attach($curso);


    }
}
