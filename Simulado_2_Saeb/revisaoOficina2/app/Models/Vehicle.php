<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'veiculos';

    protected $primaryKey = 'id_veiculo';

    public $timestamps = false;

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'ano',
        'id_cliente',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cliente', 'id_cliente');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_veiculo', 'id_veiculo');
    }
}