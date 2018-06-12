<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Servicio;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	// Obligamos al usuario a hacer login
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }


	public function home() {
		return view('welcome');
	}
	/**
	 * Según el tipo de usuario devuelve una vista u otra.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if(Auth::user() == null)
			return view('welcome');

		$user =  Auth::user()->tipo;
		if ( $user == 'admin' )
			return view('home/home');

		if ( $user == 'user')
			return redirect('fiesta/user');
		
		if ( $user == 'empresa'){
			$obj = new Servicio();
			$servicios = $obj->getEmpresa(Auth::user()->id);
			return view('user_empresa', compact('servicios'));
		}
		else
			return view('welcome');
	}

	public function contactar()
	{
		return view('contacto');
	}

	public function quien()
	{
		return view('quienes');
	}
}
