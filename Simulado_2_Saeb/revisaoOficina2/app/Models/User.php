<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    protected function casts(): array
    {
        return [
            'senha' => 'hashed',
        ];
    }

    public function getAuthPasswordName(): string
    {
        return 'senha';
    }
}