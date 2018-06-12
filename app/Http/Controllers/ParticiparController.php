<?php

namespace App\Http\Controllers;

use App\Participar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invite;

class ParticiparController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function unirseFiesta(Request $request)
    {
        $idUser = auth()->user()->id;
        $idFiesta = $request->get('id');
        $participar = new Participar();
        $participar->registrame($idUser, $idFiesta);
        return view('home');
    }

    public function eliminar(Request $request)
    {
        $idFiesta = $request->get('fUyEi');
        $participar = new Participar();
        $participar->deletePart($idFiesta);
		return redirect('/fiesta/user');
    }
    
    public function sendEmail()
	{
		$email = $_GET['mail'];
		$fiesta = $_GET['fPi'];
		
		Mail::to($email)->send(new Invite($email, $fiesta));
		return redirect('/fiesta/fiesta?fiesta='.$fiesta)->with('status', "Invitación enviada correctamente");
	}
	
	public function unirseEmail()
	{
	    $email = $_GET['mail'];
	    $fiesta = $_GET['fPi'];
	    $obj = new User();
	    $user = $obj->getEmail($email);
	    if(!$user) {
	        return redirect('/')->with('status', "¿No tienes cuenta? ¿Quiéres unirte a la fiesta? ¡Regístrate!");
	    } else {
	        $par = new Participar();
    	    $par->registrame($user[0]['id'],$fiesta);
    	    return redirect('/')->with('status', "Has sido añadido a la fiesta con éxito");
	    }
	}
}
