<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $fillable = [
        'data',
        'hora',
        'descricao',
        'pet_id',
    ];

    public $timestamps = true;

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}