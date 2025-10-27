<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {
    protected $table = 'agendas';
    protected $fillable = [
        'titulo', 
        'data',
        'hora',
        'local_1',
        'local_2',
        'programacao',
        'realizado'
    ];
    public $timestamps = true;
}