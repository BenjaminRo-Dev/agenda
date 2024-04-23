<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{

    public function run(): void
    {
        $materias = [
            'Educacion Fisica',
            'Valores',
            'Musica',
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

        //Crea las materias para los grados de primaria y el paralelo A
        foreach ($materias as $materia) {
            foreach ($grados as $grado) {
                \App\Models\Materia::create([
                    'nombre' => $materia,
                    'grado' => $grado,
                    'paralelo' => 'A',
                    'nivel_id' => 1,//Primario
                    'gestion' => date('Y'),
                    'nombre_completo' => $materia . ' ' . $grado . ' A Primaria ' . date('Y')
                ]);
            }
        }
        //Crea las materias para los grados de primaria y el paralelo B
        foreach ($materias as $materia) {
            foreach ($grados as $grado) {
                \App\Models\Materia::create([
                    'nombre' => $materia,
                    'grado' => $grado,
                    'paralelo' => 'B',
                    'nivel_id' => 1,//Primario
                    'gestion' => date('Y'),
                    'nombre_completo' => $materia . ' ' . $grado . ' B Primaria ' . date('Y')
                ]);
            }
        }
    }
}
