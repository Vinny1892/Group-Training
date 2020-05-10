<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/*https://www.hostinger.com.br/tutoriais/tags-wordpress/#Tags-WordPress-x-Categorias*/
class Category extends Model
{
    protected $fillable = ['title', 'description', "id_rooms", "id_modality"];/*id e slug gerado automaticamente*/
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'category' ;

    
	//nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }



	
}
