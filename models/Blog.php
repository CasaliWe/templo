<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    protected $table = 'blog';
    protected $fillable = [
        'capa', 'tag', 'titulo', 'mini_descricao', 'conteudo'
    ];
    public $timestamps = true;
}