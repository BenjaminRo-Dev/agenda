<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'detalle',
        'fecha_publicacion',
        'fecha_actividad',
        'gestion',
        'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->belongsToMany(User::class, 'comentarios', 'publicacion_id', 'user_id')->withPivot('contenido');
    }

    public function visualizaciones()
    {
        return $this->belongsToMany(User::class, 'visualizaciones', 'publicacion_id', 'user_id');
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class);
    }

    public function tipoPublicacion()
    {
        return $this->belongsTo(TipoPublicacion::class);
    }

    public function multimedia()
    {
        return $this->belongsToMany(Multimedia::class);
    }

}
