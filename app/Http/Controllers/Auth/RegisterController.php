<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Model_has_roles;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('guest',['except' => ['logout','showRegistrationForm','register', 'index','edit','search','destroy','update']]);
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
           // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
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
            'isAdmin' => '1',
            'cedula' => $data['cedula'],
            'telefono' => $data['telefono'],
        ]);
    }

    public function search(){


        $users = User::where('isAdmin','1')->get();

        return view('auth.register_search',compact('users'));

    }


    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route("register.search")->with(["message" => "Usuario eliminado"]);
    }


     public function edit(User $user)
    {
        return view("auth.register_edit", ['user' => $user]);
    }


    public function update(Request $request, User $user)
    {
        //$this->validator($request->all())->validate();


        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->cedula   = $request->cedula;
        $user->telefono = $request->telefono;
        if($request->password){
        $user->password = Hash::make($request->password);
        }
        $user->saveOrFail();


    return redirect()->route("register.search")->with(["message" => "Usuario actualizado exitosamente"]);
    }
    
}
