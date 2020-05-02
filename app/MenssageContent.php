<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;


class MenssageContent extends Eloquent
{
    // protected $ connection = 'mongodb' ;
    // protected $ collection = 'menssageContent' ;
     protected $fillable = ['id_room','content', 'schedule', 'date'];

    /**
	*   
	*	@return retorna o objeto com os dados salvos no BD
	*/
	public function store(Request $request){
	    return Categoria::create(
	        [
	        	"id_room"=>"id_room",
	            "msg"=>[
					"content"=> "$request->content",
		            "schedule"=> "$request->schedule",
		            "date"=> "$request->date"
	            ]
	        ]
		);
	}

}
/*
exemplo de msg json
{
	"messaging": {
		"id_room": "777",
		"msg": [
		    {
				"id_user": "45",
				"content": "bora seus vagabundos",
				"schedule": "18:53",
				"date": "04/05/2020"
			},
			{
				"id_user": "2",
				"content": "ja to saindo de casa",
				"schedule": "18:54",
				"date": "04/05/2020"
			}
		]
	}
}
*/