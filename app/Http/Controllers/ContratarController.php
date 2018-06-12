<?php

namespace App\Http\Controllers;

use App\Contratar;
use Illuminate\Http\Request;
use Auth;

class ContratarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usarServicio(Request $request)
    {
        $contratar = new Contratar;
        // $data = $request->json();
        //$data = json_decode(json_encode($data), true);
        //echo print_r($data); exit;
        $id_servicio = $request->get('iNaE');
        $id_fiesta = $request->get('fUyEi');
        $id_usuario = Auth::user()->id;
        $res = $contratar->insertarRelacion($id_usuario, $id_fiesta, $id_servicio);
        return redirect('/fiesta/fiesta?fiesta='.$id_fiesta);
    }

    public function eliminar(Request $request) {
        $id_servicio = $request->get('iNaE');
        $id_fiesta = $request->get('fUyEi');
        $contratar = new Contratar();
        $contratar->deleteCont($id_servicio, $id_fiesta);
        return redirect('/fiesta/fiesta?fiesta='.$id_fiesta);
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
     * @param  \App\Contratar  $contratar
     * @return \Illuminate\Http\Response
     */
    public function show(Contratar $contratar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contratar  $contratar
     * @return \Illuminate\Http\Response
     */
    public function edit(Contratar $contratar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contratar  $contratar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contratar $contratar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contratar  $contratar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contratar $contratar)
    {
        //
    }
}
