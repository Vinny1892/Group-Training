<?php

namespace App;

use Mockery\Exception;
use App\Helpers\SlugUnique;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;

    protected  $table = 'users';
    protected $connection = "mongodb";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'personal', 'dateBirth', 'sexo', 'level', 'objective','slug'
    ];

    public function  isAdmin(){
       return $this->role === 'admin';
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst(strtolower($value));
        $this->attributes['pathImage'] = strtolower(Str::slug($value));//cria slug automaticamente
    }  
    
     static public function createSlug($name){
         try{
            $slug =  New SlugUnique(User::class);
          return   $slug->createSlug($name);
         }catch(Exception $ex){
             echo "erro ao criar slug";
         }
    }


    

    /*futuralmente, podemos ter novas ideias*/
    // $opcoes_do_user = [
    //     'personal'=>[true, false],
    //     'level'=>['iniciante', 'intermediário', 'avançado', 'profissional']
    // ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}
