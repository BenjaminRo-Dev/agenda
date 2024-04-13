<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            // UserSeeder::class,
            NivelSeeder::class,
            CursoSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'password' => bcrypt('00000000'), // 8 veces 0
            'email' => 'test@example.com',
            'role_id' => 1 //Administrador
        ]);
    }
}
