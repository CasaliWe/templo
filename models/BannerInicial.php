<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class BannerInicial extends Model {
    protected $table = 'banners_iniciais';
    protected $fillable = [
        'banner_desktop', 
        'banner_mobile'
    ];
    public $timestamps = false;
}