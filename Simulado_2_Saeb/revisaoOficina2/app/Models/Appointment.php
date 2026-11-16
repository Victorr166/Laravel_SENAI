<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'agendamentos';

    protected $primaryKey = 'id_agendamento';

    public $timestamps = false;

    protected $fillable = [
        'data_agendamento',
        'descricao_servico',
        'status',
        'id_cliente',
        'id_veiculo',
    ];

    protected function casts(): array
    {
        return [
            'data_agendamento' => 'datetime',
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cliente', 'id_cliente');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_veiculo', 'id_veiculo');
    }
}