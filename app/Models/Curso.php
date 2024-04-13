<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['grado', 'paralelo', 'gestion', 'nivel_id'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function profesor()
    {
        return $this->belongsToMany(Materia::class);
    }

    

}
