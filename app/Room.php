<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;


class Room extends Eloquent
{

    // protected $ connection = 'mongodb' ;
    // protected $ collection = 'room' ;
    protected $fillable = ['image', 'title', 'modality', 'description','public', 'key', 'place', 'standard_time', 'date', 'user_id', 'tags', "id_categories"];


    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }

    
}
