<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class);
    }

    public function tutor()
    {
        return $this->belongsToMany(Tutor::class);
    }

}
