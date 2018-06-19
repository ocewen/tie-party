<?php

namespace App\Http\Controllers;

use Auth;
use App\Usar;
use App\User;
use App\Fiesta;
use App\Servicio;
use App\Contratar;
use App\Amigos;
use App\Participar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FileUpload;

class FiestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fiestas = $this->showAll();
        if(auth()->user()->tipo == "user") {
            return view ('fiesta/fiesta_user');
        } else if(auth()->user()->tipo == "admin"){
            return view ('fiesta/fiesta', compact('fiestas'));
        } else {
            return redirect('/home');
        }
    }

    public function indexEmpresa()
    {
        return view('user_empresa');
    }

    public function see()
    {
        $id = $_GET['fiesta'];
        $obj = new Fiesta();
        $arr = $obj->get($id);
        $kk = $obj->compareId($id);
        if(count($kk) < 1)
            return redirect('/')->with('status', 'ERROR: No seas gitano');
        $participar = new Participar();
        $part = $participar->getParticipaciones();
        $obj = new Amigos();
        $count = $obj->getCount();
        return view('fiesta/viewfiesta', compact('arr', 'part', 'count'));
    }

    public function unirseFiesta(Request $request)
    {
        $idUser = auth()->user()->id;
        $idFiesta = $request->get('id');
        $obj = new Fiesta();
        $idFiesta2 = $obj->getByName($idFiesta);
        $participar = new Participar();
        $participar->registrame($idUser, $idFiesta2[0]['id']);
        return view('home/user');
    }

    public function invitados()
    {
        $id_fiesta = $_GET['id_fiesta'];
        $participar = new Participar();
        $part = $participar->getPartFies($id_fiesta);
        foreach($part as $user) {
            $obj = new User();
            $arr[] = $obj->get($user['id_usuario']);
            $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $arr[0][0]['email'] ) ) ) . "?d=" . urlencode("https://www.somewhere.com/homestar.jpg") . "&s=" . 240;
				if(file_exists('../../public/images/users/' . $arr[0][0]['id'])) {
					$arr[0][0]['foto'] = 'http://tie-party-krast.c9users.io/images/users/'. $arr[0][0]['id'];
				} else if(@fopen($grav_url,"r")){
					$arr[0][0]['foto'] = $grav_url;
				} else {
					$arr[0][0]['foto'] = 'http://tie-party-krast.c9users.io/images/users/default.jpg';
				}
        }
        return $arr;
    }


    //Show Methods
    //------------

    public function personalUser() {
        if(Auth::user()->tipo != 'user')
            return redirect('/home');

        $objeto = new Fiesta();
        $id = auth()->user()->id;
        $fiestas = $objeto->getUserFiesta($id);
        $total = $objeto->countId();
        //crear aqui otro objeto fiesta en el que se reciban las fiestas en las que participamos
        $participar = new Participar();
        $part = $participar->getParticipaciones();
        $obj = new Amigos();
        $count = $obj->getCount();
        return view('fiesta/user_misfiestas', compact('fiestas', 'part', 'count', 'total'));
    }

    public function personalPasadas() {
        $objeto = new Fiesta();
        $id = auth()->user()->id;
        $fiestas = $objeto->getUserFiestaPasadas($id);
        return $fiestas;
    }

    public function personalUserAll() {
        $objeto = new Fiesta();
        $id = auth()->user()->id;
        $fiestas = $objeto->getUserFiesta($id);
        //crear aqui otro objeto fiesta en el que se reciban las fiestas en las que participamos
        $participar = new Participar();
        $part = $participar->getParticipaciones();
        $arr = Array($fiestas, $part);

        return $arr;
    }

    public function personalUserData() {
        $objeto = new Fiesta();
        $id = auth()->user()->id;
        $fiestas = $objeto->getUserFiesta($id);

        return $fiestas;
    }

    public function personalUserParticipa() {
        $participar = new Participar();
        $part = $participar->getParticipaciones();

        return $part;
    }

    public function showAll()
    {
        $fiestas = new Fiesta();
        $valor = $fiestas->getAll();
        return $valor;
    }

    public function showPublic()
    {
        $objeto = new Fiesta();
        $fiestas = $objeto->getPublic();
        return view ('fiesta/fiesta', compact('fiestas'));
    }

    //------------
    //------------

   public function registerFiesta(Request $request)
   {
        $fiesta = new Fiesta();
        $fiestas = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'fecha' => 'required',
            'hora' => 'required',
            'tipo' => 'required',
            'privada' => 'required',
            'id_usuario' => 'required',
        ]);
        
        $res = $fiesta->insertFiesta($request);
        if(auth()->user()->tipo == "user") {
            return view('home/user');
        }
        else {
            return redirect('/fiesta?res=' . $res);
        }
   }

   public function insertFiesta(Request $request)
   {
    $fiesta = new Fiesta();
    $fiestas = $this->validate($request, [
        'nombre' => 'required|string|max:255',
        'party-type' => 'required'
    ]);
    $res = $fiesta->crear($request);
    return redirect('fiesta/user');
   }

   public function programFiesta(Request $request) {
        $fiesta = new Fiesta();
        $contratar = new Contratar();
        $usar = new Usar();
        $participar = new Participar();

        $id = $request->get('id');
        $s = $fiesta->get($id);
        
        $servicios = $contratar->getProgram($id);
        $contratos = $contratar->getDatos($id);
        $herramientas = $usar->getProgram($id);
        $part = $participar->getMi($id);

        $usos = $usar->getDatos($id);
        if(Auth::user()->tipo != "admin" && Auth::user()->id != $s[0]['id_usuario']) {return redirect('/home');}
        return view('fiesta/fiestaprogram', compact('s', 'servicios', 'contratos', 'herramientas','usos', 'part'));
    }

    public function programDate(Request $request) {
        $fiesta = new Fiesta();

        $date = $request->get('date');
        $time = $request->get('time');
        $direccion = $request->get('direccion');
        $id = $request->get('FiPAlF');
        $party = $fiesta->act($id, $date, $time, $direccion);
        return redirect('fiesta/fiesta?fiesta='.$id);
    }

   public function editFiesta(Request $request) {
        $fiesta = new Fiesta();
        $id = $request->get('id');
        $s = $fiesta->get($id);
        if(Auth::user()->tipo != "admin" && Auth::user()->id != $s[0]['id_usuario']) {return redirect('/home');}
        return view('fiesta/fiestaviewedit', compact('s'));
    }

    public function fiestaDoEdit(Request $request){
        $fiesta = new Fiesta();
        $fiestas = $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'fecha' => 'required',
            'hora' => 'required',
            'tipo' => 'required',
            'privada' => 'required',
        ]);
        $res = $fiesta->editFiesta($fiestas);
        return redirect('/fiesta?res='.$res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fiesta  $fiesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $fiesta = new Fiesta();
        $id = $request->get('id');
        $s = $fiesta->get($id);
        if(Auth::user()->tipo != "admin" && Auth::user()->id != $s[0]['id_usuario']) {return redirect('/home');}
        $res = $fiesta->deleteOne($id);
        return redirect('/fiesta/user');
    }

    public function busquedaAjax()
    {
        $busq = $_GET['fiesta'];
        $obj = new Fiesta();

        $arr = $obj->buscarAjax($busq);
        return $arr;
    }

    public function verFiesta()
    {
        $busq = $_GET['fiesta'];
        $obj = new Fiesta();

        $arr = $obj->buscarAjax($busq);
        return $arr;
    }

    public function subirFoto(Request $request){
        $id = $_POST['fIpM'];
        $upload = new FileUpload('foto' , $id, public_path('/images/fiestas') , 15 * 1024 * 1024, FileUpload::SOBREESCRIBIR);
        $res = $upload->upload();
        return redirect('/fiesta/fiesta?fiesta='.$id);
	}
	
	public function get()
	{
	    $id = $_GET['fiesta'];
	    $obj = new Fiesta;
	    $arr = $obj->get($id);
	    return $arr;
	}
	
}
