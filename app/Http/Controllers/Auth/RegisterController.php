<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\StorePostRequest;
use Illuminate\Http\Response;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // if ($data['code'] == 101) {

        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        // } else{
        //     return false;
        // }

        $prueba = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'code' => ['required', 'string', function($attribute, $value, $fail){
                if ($value!="101" ) {
                    $fail("Codigo es invalido");   
                }
            }],
            // 'no_control' => ['required', 'string', 'unique:users'],
            // 'semester' => ['required', 'string'],
            // 'group' => ['required', 'string'],
            // 'type_user' => ['required', 'string'],
        ]);
        // var_dump($prueba);
        return $prueba;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)

    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'code' => $data['code'],
            'role' => $data['role'],
            // 'no_control' =>$data['no_control'],
            // 'semester' =>$data['semester'],
            // 'group' =>$data['group'],
            // 'type_user' =>$data['type_user'],
        ]);

        
    }

    // public function view($browser)
    // {
    //     $browser->press('Profesor');

    //     return view('/register');
    // }

}
