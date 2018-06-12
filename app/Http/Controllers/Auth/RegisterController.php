<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\VerifyMail;
use App\VerifyUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
	protected $redirectTo = '/';

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
		return Validator::make($data, [
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
			'nombre' => 'required|string|max:255',
			'apellidos' => 'required|string|max:255',
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
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$confirmation_code = '';
		for ($i = 0; $i < 50; $i++) {
			$confirmation_code .= $characters[rand(0, $charactersLength - 1)];
		}
		$email = $data['email'];
		$nombre = $data['nombre'];

		$obj = new User();
		$res =  User::create([
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'nombre' => $data['nombre'],
			'apellidos' => $data['apellidos'],
			'confirmation_code' => $confirmation_code
		]);
		
		Mail::to($email)->send(new VerifyMail($res));
		return redirect('/welcome')->with('status', "Tu cuenta ha sido registrada, por favor revisa tu Email");
	}

	public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('confirmation_code', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if($user->activo != 'S') {
                $verifyUser->user->activo = 'S';
                $verifyUser->user->save();
                $status = "Tu cuenta ha sido verificada. Por favor inicia sesión.";
            }else{
                $status = "Tu cuenta ya había sido verificada. Puedes iniciar sesión.";
            }
        }else{
            return redirect('/home')->with('status', "Tu email no puede ser identificado.");
        }
 
        return redirect('/home')->with('status', $status);
    }
}
