<?php

namespace App\Http\Controllers;

use App\User;
use Mockery\Exception;
use App\Helpers\SlugUnique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class InstallController extends Controller
{
    
    public function show(){
        $seila = Redis::get('install');
        if($seila === null) return view('install.installForm');
         return view('errors.404');

    }

    public function storageAdmir(Request $request){            
        $validate = $this->validator($request->only(['name','email','password','password_confirmation']) );
        if($validate->fails()){
            return  Redirect::route('install')->withErrors($validate)->withInput();
        }
        if($this->create($request->only(['name','email','password']))){
            Redis::set('install', true);
            return  Redirect::route('home');

        }


    }
    
    protected function create(array $data)
    {
        
        try{
            $slugHelper = new  SlugUnique(User::class);
            $slug =  $slugHelper->createSlug($data['name']);
        }catch (Exception $ex){
            echo "Erro ao criar Slug";
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=> 'admin',
            "slug" => strtolower($slug),
        ]);
    }

       /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required' , 'string' , 'min:8']
        ]);
    }
}
