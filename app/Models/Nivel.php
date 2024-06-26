<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }

}
