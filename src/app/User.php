<?php

namespace App;

use App\Services\Slug;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model  as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Str;

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
        'name', 'email', 'password','role', 'personal', 'dateBirth', 'sexo', 'level', 'objective'
    ];

    public function  isAdmin(){
       return $this->role === 'admin';
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst(strtolower($value));
        $this->attributes['slug'] = strtolower(Str::slug($value));//cria slug automaticamente
        $this->attributes['pathImage'] = strtolower(Str::slug($value));//cria slug automaticamente
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
