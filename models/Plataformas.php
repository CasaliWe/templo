<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Plataformas extends Model {
    protected $table = 'plataformas';
    protected $fillable = [
        'youtube',
        'spotify',
    ];
    public $timestamps = false;
}