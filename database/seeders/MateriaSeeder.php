<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{

    public function run(): void
    {
        $materias = [
            'Educación Física',
            'Valores',
            'Música',
            // 'Matemáticas',
            // 'Lenguaje',
            // 'Ciencias Naturales',
            // 'Ciencias Sociales',
            // 'Educación Artística',
            // 'Educación Cívica',
            // 'Computación',
            // 'Inglés',
        ];

        $grados = range(1, 6);
        $niveles = [1,2];

        foreach ($materias as $materia) {
            foreach ($grados as $grado) {
                foreach ($niveles as $nivel) {
                    \App\Models\Materia::create([
                        'nombre' => $materia,
                        'grado' => $grado,
                        'nivel_id' => $nivel,
                        'gestion' => date('Y'),
                    ]);
                }
            }
        }
    }
}
