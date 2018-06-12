<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fiesta;
use App\Amigos;
use App\Http\Manager\UserManager;
use App\Http\Resources\User as UserResource;
use Auth;
use App\FileUpload;

class UserController extends Controller
{

	public function showAll()
	{
		$this->middleware('auth');
		$usuarios = new User();
		$valor = $usuarios->getAll();
		return $valor;
	}

	public function index()
	{
		if(Auth::user()->tipo != "admin") {return redirect('/home');}
		$usuarios = $this->showAll();
		return view ('usuario/usuarios', compact('usuarios'));
	}

	public function salir()
	{
		auth()->logout();
		return redirect('/')->with('status', 'Has cerrado sesión.');
	}

	public function getEmail(Request $request)
	{
		$usuarios = new User();
		$email = $request->get('email');
		$valor = $usuarios->getEmail($email);
		if($valor[0]) //Para forzar el fallo de Ajax
			return $valor;
	}

	public function getFromEmail()
	{
		$email = $_POST['email'];
		$usuarios = new User();
		$user = $usuarios->getEmail($email);

		if($user[0] == NULL)
			return 'mal';

		if($user[0]['email'] == 'admin@admin.es'){
			return false;
		} else
		if($user[0]['email'] == $email) {
			$obj = new Amigos();
			if($obj->buscarAmigo($user[0]['id']) != 0)
				return json_encode('dup');
			
			$obj->insertAmigos(Auth::user()->id, $user[0]['id']);
				return $user;
		}
	}

	public function getFromFriends()
	{
		$busq = $_GET['fiesta'];
        $obj = new User();

        $arr = $obj->buscarAjax($busq);
        return $arr;
	}

	public function viewProfile()
	{
		$usuario = new User();
		$usuario = $usuario->get(auth()->user()->id);
		// return view ('usuario/profile', compact('usuario'));
		return $usuario;
	}

	public function modifyProfileNormal(Request $request)
	{
		echo "bien"; exit;
		$usuario = new User();
		$modificar = $this->validate($request, [
			'id' => 'required',
			'email'=> 'string|max:255',
			'nombre' => 'string|max:255',
			'apellidos' => 'string|max:255',
		]);
		echo print_r($modificar); exit;
		$res = $usuario->modifyNormal($modificar);
		return redirect('/profile/modify?res='.$res);
	}

	public function editName(Request $request)
	{
		$usuario = new User();
		$modificar = $this->validate($request, [
			'nombre' => 'string|max:255',
			'apellidos' => 'string|max:255',
		]);
		$res = $usuario->modifyNormal($modificar);
		return redirect('/user/perfil?res='.$res);
	}

	public function editPass(Request $request)
	{
		$usuario = new User();
		$modificar = $this->validate($request, [
			'new-password' => 'string|max:255',
			'rep-password' => 'string|max:255|same:new-password',
		]);
		$res = $usuario->modifyPass($modificar);
		return redirect('/?res='.$res);
	}

	public function edicion()
	{
		$usuario = new User();
		$user = $usuario->get(auth()->user()->id);
		$obj = new Amigos();
        $count = $obj->getCount();
        $objeto = new Fiesta();
        $total = $objeto->countId();
		return view('usuario/editprofile', compact('user', 'count', 'total'));
	}

	// Register User Function
	public function registerUser(Request $request)	{
		$user = new User();
		$usuario = $this->validate($request, [
			'email' => 'required|string|max:255',
			'password' => 'required|string|max:255',
			'passwordrepeat' => 'required|string|max:255|same:password',
		]);
		$res = $user->insertUser($usuario);
		return redirect('/login?res=' . $res);
	}

	public function deleteUser(Request $request)
	{
		if(Auth::user()->tipo != "admin") {return redirect('/home');}
		$usuario = new User();
		$id = $request->get('id');
		$res = $usuario->deleteOne($id);
		return redirect('/usuarios');
	}

	public function editUser(Request $request) {
		if(Auth::user()->tipo != "admin") {return redirect('/home');}
		$usuario = new User();
		$id = $request->get('id');
		$s = $usuario->get($id);

		return view('usuario/usuarioviewedit', compact('s'));
	}

	public function usuarioDoEdit(Request $request){
		$usuario = new User();
		$usuarios = $this->validate($request, [
			'id' => 'required',
			'email' => 'required|string|max:255',
			'nombre' => 'required|string|max:255',
			'apellidos' => 'required|string|max:255',
			'tipo' => 'required|string|max:255',
		]);
		$res = $usuario->editUsuario($usuarios);
		return redirect('/usuarios?res='.$res);
	}

	public function subirFoto(Request $request){
        if(Auth::user()->id){
            $upload = new FileUpload('foto' , Auth::user()->id, public_path('/images/users') , 2 * 1024 * 1024, FileUpload::SOBREESCRIBIR);
            $res = $upload->upload();
            return redirect('/user/perfil');
        }else{
            return redirect('/home');
        }
	}
}
