<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Support\Str;

class Modality extends Eloquent
{
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'modality' ;
     protected $fillable = ['title','description', 'id_rooms', 'id_tags', 'id_categories', 'pathImage'];

    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }



	
}
