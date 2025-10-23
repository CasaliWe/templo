<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model {
    protected $table = 'contatos';
    protected $fillable = [
        'instagram',
        '_instagram',
        'facebook',
        '_facebook',
        'linkedin',
        '_linkedin',
        'email',
        'telefone',
        'wpp'
    ];
    public $timestamps = false;
}