<?php

namespace App;
use Illuminate\Support\Str;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

/*https://www.hostinger.com.br/tutoriais/tags-wordpress/#Tags-WordPress-x-Categorias*/
class Tag extends Eloquent
{
	protected $fillable = ['name', 'description', "id_rooms", "id_modality"];

    public function setNameAttribute($value){
    	$this->attributes['name'] = ucfirst(strtolower($value));
    	$this->attributes['slug'] = strtolower(Str::slug($value));
    }
	
	

}
