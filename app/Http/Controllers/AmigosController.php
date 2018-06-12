<?php

namespace App\Http\Controllers;

use App\Amigos;
use Illuminate\Http\Request;

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
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amigos  $amigos
     * @return \Illuminate\Http\Response
     */
    public function show(Amigos $amigos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amigos  $amigos
     * @return \Illuminate\Http\Response
     */
    public function edit(Amigos $amigos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amigos  $amigos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amigos $amigos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amigos  $amigos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amigos $amigos)
    {
        //
    }
}
