<?php

namespace App\Http\Controllers;

use App\Herramientas;
use Illuminate\Http\Request;

class HerramientasController extends Controller
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
        $valor = $this->showAll();
        return view ('herramientas/herramientas', compact('valor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerHerramienta(Request $request)  {
        $herramienta = new Herramientas();
        $array = $this->validate($request, [
            'nombre_herramienta' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);
        $res = $herramienta->insertHerramienta($array);
        return redirect('/herramientas?res=' . $res);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function showAll() {
        $herramienta = new Herramientas();
        $valor = $herramienta->getAll();
        return $valor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function editHerramienta(Request $request) {
        $herramienta = new Herramientas();
        $id = $request->get('id');
        $s = $herramienta->get($id);
        return view('herramientas/herramientasviewedit', compact('s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function herramientaDoEdit(Request $request) {
        $heramienta = new Herramientas();
        $array = $this->validate($request, [
            'id' => 'required',
            'nombre_herramienta' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);
        $res = $heramienta->editHerramienta($array);
        return redirect('/herramientas?res='.$res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Herramientas  $herramientas
     * @return \Illuminate\Http\Response
     */
    public function deleteHerramienta(Request $request) {
        $herramienta = new Herramientas();
        $id = $request->get('id');
        $res = $herramienta->deleteOne($id);
        return redirect('/herramientas?res='.$res);
    }
}
