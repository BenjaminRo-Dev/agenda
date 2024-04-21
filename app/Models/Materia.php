<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'grado', 'gestion', 'paralelo' , 'nivel_id', 'nombre_completo'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class);
    }

    public function publicaciones()
    {
        return $this->morphToMany(Publicacion::class, 'publicable');
    }

}
