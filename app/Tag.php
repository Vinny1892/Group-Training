<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;

/*https://www.hostinger.com.br/tutoriais/tags-wordpress/#Tags-WordPress-x-Categorias*/
class Tag extends Eloquent
{
	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'tag' ;

    
	//nao pode mudar o nome desse metodo, reservado (setNomeAttribute)
    public function setTitleAttribute($value){
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);//cria slug automaticamente
    }

	protected $fillable = ['title', 'description', "id_rooms", "id_modality"];/*id e slug gerado automaticamente*/

	/**
	*   
	*	@return retorna o objeto com os dados salvos no BD
	*/
	public function store(Request $request){
	    return Categoria::create(
	        [
	            "title" => "$request->title",
	            "id_modality"=> "$request->id_modality",
	            "description"=> "$request->description",
	            "id_rooms"=> "$request->id_rooms",
	        	/*slug*/
	        ]
		);
	}

}
