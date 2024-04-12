<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPublicacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }

}
