<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

class Categoria extends Eloquent
{
    protected $table = 'categorias';
    protected $fillable = ['Teste'];
    
}
