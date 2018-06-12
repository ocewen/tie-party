<?php

namespace App\Http\Controllers;

use App\Usar;
use Illuminate\Http\Request;

class UsarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usarHerramienta(Request $request)
    {
        $usar = new Usar();
        $id_herramienta = $request->get('id_herramienta');
        $id_fiesta = $request->get('id_fiesta');
        $res = $usar->insertarRelacion($id_fiesta, $id_herramienta);
        return "true";
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
     * @param  \App\Usar  $usar
     * @return \Illuminate\Http\Response
     */
    public function show(Usar $usar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usar  $usar
     * @return \Illuminate\Http\Response
     */
    public function edit(Usar $usar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usar  $usar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usar $usar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usar  $usar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usar $usar)
    {
        //
    }
}
