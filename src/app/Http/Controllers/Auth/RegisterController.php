<?php /** @noinspection ALL */

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Helpers\SlugUnique;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Mockery\Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest')->except(['edit' ,'update','validateUpdate']);
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        try{
            $slugHelper = new  SlugUnique(User::class);
            $slug =  $slugHelper->createSlug($data['name']);
        }catch (Exception $ex){
            //Redirecionar para tela de erro;
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=> 'normal',
            "slug" => strtolower($slug),
        ]);
    }

    public function show(){
        return view('login.cadastro');
    }



    public function storage(Request $request)
    {
        $validate = $this->validator($request->only(['name','email','password','password_confirmation']) );
        if($validate->fails()){
            return  Redirect::route('register')->withErrors($validate)->withInput();
        }
        $this->create($request->only(['name','email','password']));
            return  Redirect::route('login');
    }

   

    public function update(User $user,Request $request)
    {
       
        $slugHelper = new  SlugUnique(User::class);
        
        $validator = Validator::make($request->all(),[
            'name' => ['string', 'max:255'],
            'email' => [ 'email','required',"string",'max:255',"unique:users,email,_id,$user->_id"],
            'password' => [ 'nullable' ,'min:8', 'confirmed'],
            'password_confirmation' =>  [ 'nullable' , 'min:8'],
        ]);
        if ($validator->fails() )  return  Redirect::route('user.edit' , ['slugName' => $user->slug ])->withErrors($validator)->withInput();
        $user->slug = User::createSlug($request->name);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        if( $user->save() )  return Redirect::route('user.edit',['slugName'=> $user->slug])->with("message","Usuario Atualizada com Sucesso");
    }




}
