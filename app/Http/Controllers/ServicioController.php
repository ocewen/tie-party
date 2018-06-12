<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\FileUpload;
use Illuminate\Http\Request;
use Auth;

class ServicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo != "admin" && Auth::user()->tipo != "empresa") {return redirect('/home');}
        $valor = $this->showAll();
        return view ('servicio/servicio', compact('valor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewAddServicio()
    {
        if(Auth::user()->tipo != "admin" && Auth::user()->tipo != "empresa") {return redirect('/home');}
        return view ('servicio/addservicios');
    }

    public function registerServicio(Request $request)  {
        $servicio = new Servicio();
        $servicios = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'servicio-type' => 'required|string|max:255',
            'num' => 'required|integer'
        ]);
        $res = $servicio->insertServicio($servicios);
        return redirect('/home');
    }

    public function deleteServicio(Request $request) {
        if(Auth::user()->tipo != "admin" && Auth::user()->tipo != "empresa") {return redirect('/home');}
        $servicio = new Servicio();
        $id = $request->get('id');
        $obj = $servicio->get($id);
        if($obj[0]['id_usuario'] == Auth::user()->id)
            $res = $servicio->deleteOne($id);
        return redirect('/home');
    }

    public function showAll() {
        $servicio = new Servicio();
        $valor = $servicio->getAll();
        return $valor;
    }

    public function getTodosFiesta() {
        $id = $_GET['id_fiesta'];
        $servicio = new Servicio();
        $valor = $servicio->getFiesta($id);
        return $valor;
    }

    public function getEmpresa() {
        if(Auth::user()->tipo != "admin" && Auth::user()->tipo != "empresa") {return redirect('/home');}
        $servicio = new Servicio();
        $id = Auth::user()->id;
        $valor = $servicio->getEmpresa($id);
        return view('empresa/viewempresaservicio', compact('valor'));
    }

    public function editServicio(Request $request) {
        if(Auth::user()->tipo != "admin" && Auth::user()->tipo != "empresa") {return redirect('/home');}
        $servicio = new Servicio();
        // echo var_dump($request);
        $id = $request->get('IdEsQvAeA');
        return redirect('servicio/servicio?servicio='.$id);
    }
    //VAN UNIDAS TANTO ARRIBA COMO ABAJO//
    public function getPlantilla(Request $request)
    {
        $servicio = new Servicio();
        $id = $request->get('servicio');
        $s = $servicio->get($id);
        return view('servicio/servicioviewedit', compact('s'));
    }

    public function servicioDoEdit(Request $request) {
        if(Auth::user()->tipo != "admin" && Auth::user()->tipo != "empresa") {return redirect('/home');}
        $servicio = new Servicio();
        $servicios = $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'tipo' => 'required|string|max:255',
            'numero_personas' => 'required|integer',
        ]);
        $res = $servicio->editServicio($servicios);
        return redirect('/home');
    }

    public function buscar()
    {
        $busq = $_GET['servicio'];
        $fiesta = $_GET['idfiesta'];
        $obj = new Servicio();

        $arr = $obj->buscarAjax($busq, $fiesta);
        return $arr;
    }

    public function subirFoto(Request $request){
        $id = $_POST['fIpM'];
        $upload = new FileUpload('foto' , $id, public_path('/images/servicios') , 5 * 1024 * 1024, FileUpload::SOBREESCRIBIR);
        $res = $upload->upload();
        return redirect('/servicio/servicio?servicio='.$id);
	}
}
