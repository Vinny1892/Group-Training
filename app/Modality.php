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



	/**
	*   
	*	@return retorna o objeto com os dados salvos no BD
	*/
	public function store(Request $request){
	    return Categoria::create(
	        [
	            "title" => "$request->title",
	            "description"=> "$request->description",
	            "id_rooms"=> "$request->id_rooms",
	            "id_tags"=> "$request->id_tags",
	            "id_categories"=> "$request->id_categories",
	            "image"=> "img/room/777.png",/*criar um metodo faz faz cria o caminho da imagem*/
	        	/*slug*/
	        ]
		);
	}
}
