<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;



class DirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $users=User::all();
        return view('dir');
    }

    // public function validator(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'code' => ['required', 'string', function($attribute, $value, $fail){
    //             if ($value!="101" ) {
    //                 $fail("Codigo es invalido");   
    //             }
    //         }]
    //     ]);
    //     return $validator;  
    // }


    public function create(array $data, Request $request)
    {
        return User::create([
            'name' => $data['name'],
            'code' => $data['code'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {         
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email','unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'code' => ['required', 'string', function($attribute, $value, $fail){
                    if ($value!="101" ) {
                        $fail("Codigo es invalido");   
                    }
                }],
            ]);
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->code = $request->code;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;

            $user->save();

            return redirect()->route('login', $user);

        // $user = User::create($request->except('semester'));
        // $user->name=$request->input('name');
        // $user->email=$request->input('email');
        // $user->code=$request->input('code');
        // $user->password=bcrypt($request->input('password'));
        // $user->role=$request->input('role');
        // $user->save(); 
        // return redirect()->route('login');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('edit-user', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}