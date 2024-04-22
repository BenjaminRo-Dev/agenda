<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'telefono',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }
    
    public function isAdministrador()
    {
        return $this->role->nombre === 'Administrador';
    }

    public function profesor()
    {
        return $this->hasOne(Profesor::class);
    }

    public function isProfesor()
    {
        return $this->role->nombre === 'Profesor';
    }
    
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }

    public function isEstudiante()
    {
        return $this->role->nombre === 'Estudiante';
    }

    public function tutor()
    {
        return $this->hasOne(Tutor::class);
    }

    public function isTutor()
    {
        return $this->role->nombre === 'Tutor';
    }

    public function publicacion()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function curso()
    {
        if($this->isEstudiante()){
            return $this->estudiante->cursos;
        }else{
            return $this->profesor->cursos;
        }
    }
    


}
