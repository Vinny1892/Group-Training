<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Support\Str;

class Modality extends Eloquent
{
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'modality' ;
    protected $fillable = ['name', 'description', 'id_rooms', 'id_tags', 'id_categories', 'pathImage'];

    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setNameAttribute($value){
    	$this->attributes['name'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }	
}