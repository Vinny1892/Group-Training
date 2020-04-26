<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Socialite;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['logout',]);
        $this->middleware('guest')->except('logout');

    }

    public function show(){
        // retorna um arquivo pra view
        return view('login.login');
    }

    public function logout(){
        Auth::logout();
        return Redirect::route('login');
    }

    protected function validator($data){
        return Validator::make($data , [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];
        $validate = $this->validator($credentials);
        if($validate->fails()){
          return  Redirect::route('login')->withErrors($validate)->withInput();
        }
        //realizar a tentativa de login
        if ( Auth::attempt($credentials)) {
            return Redirect::route('dashboard');
        }
       return   Redirect::route('login')->withErrors(['message' => "Login ou Senha incorretos"]);
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try{
            $user = Socialite::driver('facebook')->user();
        }catch (\Exception $e) {
            return Redirect::route('login');
        }

        $userDB = User::where('email' , $user->email)->first();

        if($userDB == null){
            $userDB = User::create([
                'name' => $user['name'],
                'email' => $user['email']
            ]);
            // Fazer redirect para tela de listar sala
        }
        Auth::login($userDB,true);
        return Redirect::route('dashboard');


    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return Redirect::route('login');
        }

        $userDB = User::where('email' , $user->email)->first();
        if($userDB == null){
           $userDB = User::create([
                'name' => $user['name'],
                'email' => $user['email']
            ]);
            // Fazer redirect para tela de listar sala
        }
        Auth::login($userDB,true);
        return Redirect::route('dashboard');


    }



}
