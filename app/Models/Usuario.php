<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $timestamps = false; //laravel por default espera pelas colunas created_at e update_at

    protected $dates = ['nasc'];

    protected $fillable = [
        'nome',
        'cpf',
        'nasc',
        'email',
        'telefone',
        'logradouro',
        'cidade',
        'estado'
    ];
}
