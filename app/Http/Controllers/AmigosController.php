<?php

namespace App\Http\Controllers;

use App\Amigos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AmigosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = auth()->user()->id;
        $amigos = new Amigos();
        $amigos = $amigos->getMisAmigos($id); 
        // return view ( 'amigos/amigos', compact('amigos') );
        return $amigos;
    }
    
    public function indexFiesta()
    {
        $id = auth()->user()->id;
        $amigos = new Amigos();
        $fiesta = $_GET['fiesta'];
        $amigos = $amigos->getMisAmigosFiesta($id, $fiesta); 
        return $amigos;
    }

    public function borrar()
    {
        $id = $_GET['id_amistad'];
        $qq = Amigos::find($id);
        $qq->delete();
        return 'true';
    }
    
    public function aceptar()
    {
        $id = $_GET['id_amistad'];
        $amigos = new Amigos();
        $qq = $amigos->aceptar($id);
        return "true";
    }

    public function verSolicitudes()
    {
        $obj = new Amigos();
        return $obj->getSolicitudes();
    }
    
    public function delete(Request $request)
    {
        $id = $request->get('fDpS');
        $obj = new Amigos();
        $arr = $obj->getByUser();
        foreach($arr as $rel)
        {
            if(Hash::check($rel['id'], $id)) {
                $compare = Amigos::find($rel['id']);
                $compare->delete();
                return redirect('/fiesta/user');
            }
        }
    }
}
