<?php

namespace App;
use Illuminate\Support\Str;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

/*https://www.hostinger.com.br/tutoriais/tags-wordpress/#Tags-WordPress-x-Categorias*/
class Category extends Eloquent
{
    protected $fillable = ['name', 'description', "id_rooms", "id_modality",'slug'];
	 // protected  $connection = 'mongodb';
  //    protected  $table = 'categories';

    public function setNameAttribute($value){
    	$this->attributes['name'] = ucfirst(strtolower($value));
    	$this->attributes['slug'] = strtolower(Str::slug($value));
    }



	
}
