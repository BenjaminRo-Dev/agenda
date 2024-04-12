<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo_grupo_id'];

    public function tipoGrupo()
    {
        return $this->belongsTo(TipoGrupo::class);
    }

    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class);
    }

}
