<?php

namespace App;
use Illuminate\Support\Str;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

/*https://www.hostinger.com.br/tutoriais/tags-wordpress/#Tags-WordPress-x-Categorias*/
class Category extends Eloquent
{
    protected $fillable = ['name', 'description', "id_rooms", "id_modality",'slug'];/*id e slug gerado automaticamente*/
	 protected  $connection = 'mongodb';
     protected  $table = 'categories';

    
	//nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }



	
}
