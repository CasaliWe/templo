<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model {
    protected $table = 'lancamento';
    protected $fillable = [
        'titulo',
        'youtube',
        'spotify',
        'deezer',
        'amazon',
        'imagem'
    ];
    public $timestamps = false;
}