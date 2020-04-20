<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function show(){
        return view('login.login');
    }


    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = auth('web')->attempt($credentials)) {
                return $this->respondWithToken($token,'dashboard.show');
        }
       return   Redirect::route('login.show')->withErrors(['message' => "Login ou Senha incorretos"]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function respondWithToken($token,$nameRoute)
    {
        return Redirect::route($nameRoute,['token' => $token])->withHeaders([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }



    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */

    public function guard()
    {
        return Auth::guard();
    }

    /**
     * Refresh a token.
     *
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }


    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function logout()
    {
        $this->guard()->logout();

        return redirect()->route('login.show');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        echo "$user";
        // $user->token;
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $userDB = User::where('email' , $user->email)->first();
        if($userDB == null){
            User::create([
                'name' => $user['name'],
                'email' => $user['email']
            ]);
            echo "Funcionou";

            // Fazer redirect para tela de listar sala

        }

    }



}
