<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'tipo',
        'data',
        'descricao',
        'categoria',
        'valor'
    ];
}
