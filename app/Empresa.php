<?php

namespace App;

use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'id','email','nombre','apellidos', 'tipo', 'confirmation_code'
    ];

    protected $hidden = [
        'id', 'password',
    ];

    public function registerEmpresa($empresa, $confirmation_code) {
        
        $this->email = $empresa['email'];
        $this->password = Hash::make($empresa['password']);
        $this->nombre = $empresa['nombre'];
        $this->apellidos = $empresa['apellidos'];
        $this->tipo = "empresa";
        $this->confirmation_code = $confirmation_code;

        $res = $this->save();

		return $res;
    }
}
