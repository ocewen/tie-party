<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Fiesta;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ( 'home/empresa' );
    }
    
    public function getFiestas()
    {
        $obj = new Fiesta();
        $fiestas = $obj->getUserFiesta(auth()->user()->id);
        return view ( 'fiesta/empresa', compact('fiestas'));
    }

    public function viewregister()
    {
        return view ( 'empresa/registro' );
    }

    public function register(Request $request)
    {
        $objeto = new Empresa();
        $datos = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$confirmation_code = '';

		for ($i = 0; $i < 50; $i++) {
			$confirmation_code .= $characters[rand(0, $charactersLength - 1)];
        }

        $res = $objeto->registerEmpresa($datos, $confirmation_code);
        $emp = 'S';

        Mail::to($request['email'])->send(new VerifyMail($confirmation_code, $emp));

        $status = "Hemos enviado un enlace de activación a tu correo. Por favor revisa tu correo.";
        return redirect('/')->with('status', $status);
            
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
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
