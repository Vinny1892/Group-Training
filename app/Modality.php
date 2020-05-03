<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

class Modality extends Eloquent
{
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'modality' ;
     protected $fillable = ['title','description', 'image', 'id_rooms', 'id_tags'];

    //nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }



	
}
