<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;
    
    protected $fillable = ['titulo', 'detalle', 'url'];

    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class);
    }

}
