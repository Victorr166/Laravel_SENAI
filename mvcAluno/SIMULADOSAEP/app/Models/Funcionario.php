<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'cargo',
        'email',
        'dataAdmissao',
        'salario',
        'sobreno'
    ];
   
    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}