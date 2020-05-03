<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;


class MenssageContent extends Eloquent
{
    // protected $ connection = 'mongodb' ;
    // protected $ collection = 'menssageContent' ;
     protected $fillable = ['id_room','content', 'schedule', 'date'];


}
