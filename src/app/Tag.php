<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

/*https://www.hostinger.com.br/tutoriais/tags-wordpress/#Tags-WordPress-x-Categorias*/
class Tag extends Eloquent
{
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'tag' ;

    
	//nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['name'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }

	protected $fillable = ['name', 'slug','description', "id_rooms", "id_modality"];/*id e slug gerado automaticamente*/

	

}
