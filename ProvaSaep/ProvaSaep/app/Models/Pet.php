<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';

    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'idade',
        'sexo',
        'tutor_id',
    ];

    public $timestamps = true;

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}