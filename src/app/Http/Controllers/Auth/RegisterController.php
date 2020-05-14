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
            "slug" => $slug,
        ]);
    }

    public function show(){
        return view('login.cadastro', );
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

    private function validateUpdate(User $user, $data)
    {
        if($data['email']  === $user->email){

            return Validator::make($data,[
                'name' => ['string', 'max:255'],
                'email' => ['string', 'email', 'max:255'],
                'password' => [ 'nullable' ,'min:8', 'confirmed'],
                'password_confirmation' =>  [ 'nullable' , 'min:8']
            ]);
        }else{
            return Validator::make($data,[
                'name' => ['string', 'max:255'],
                'email' => ['string', 'email', 'max:255', 'unique:users'],
                'password' => [ 'nullable' ,'min:8', 'confirmed'],
                'password_confirmation' =>  [ 'nullable' , 'min:8']
            ]);
        }

    }

    private function update(User $user, $data)
    {
        if($user->name !== $request->name) {
            try {
                $slugHelper = new SlugUnique(User::class);
            } catch (Exception $ex) {
                echo 'erro ao criar slug';
            }
            $user->slug = $slugHelper->createSlug($request->name);
            $user->name = $request->name;
        }
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        return $user->save();
    }




    public function edit(User $user , Request $request){
        if($request->email !== $user->email){
            $request->validate(['email' => 'unique:user,email']);
            $user->email = $request->email;
        }
        if(Hash::check($request->password , $user->password)){
        }
        if($request->name === $user->name)
        {


        }
        $credentials = $request->only(['name','email','password','password_confirmed']);
        $validate = $this->validateUpdate( $user , $credentials);
        if($validate->fails()){
            return Redirect::route('dashboard.edit', ["slugName" => $user->slug] )->withErrors($validate)->withInput();
        }


        if($this->update($user , $credentials)){
            return  Redirect::route('dashboard.edit' , ["slugName" => $user->slug])->with("status" , "Usuario Atualizado")->withInput();
        }else{
            echo "erro ao atualizar registro";
        }

        }




}
