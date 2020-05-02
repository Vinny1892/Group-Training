<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }
}
