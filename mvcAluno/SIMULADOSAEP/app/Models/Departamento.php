<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

    protected $fillable = [
        'nome',
        'dataCriacao',
        'orcamento',
        'sigla'
    ];

     public function funcionario(){
        return $this->belongsTo(funcionario::class);
    }
    
}