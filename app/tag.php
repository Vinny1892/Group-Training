<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;


class tag extends Eloquent
{
	protected $fillable = ['title', 'description'];
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'tag' ;

    
	//nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }
}
