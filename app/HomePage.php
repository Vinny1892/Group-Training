<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;


class HomePage extends Eloquent
{
    //essa classe vai ser usada posteiormente para manipular o conteudo da pagina principal
    //a deixando com conteudo dinamico
    //para que o gerente consiga mudar o conteudo facilmente

	// protected $ connection = 'mongodb' ;
    // protected $ collection = 'homepege' ;
     protected $fillable = [];

}
