<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellidos','email', 'password', 'confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'passwordrepeat', 'remember_token',
    ];

    public function insertUser($user)
    {
        $this->email = $user['email'];
        $this->nombre = $user['nombre'];
        $this->password = Hash::make($user['password']);
        $res = $this->save();
        return $res;
    }

    public function crear($user)
    {
        $this->email = $user['email'];
        $this->nombre = $user['nombre'];
        $this->apellidos = $user['apellidos'];
        $this->password = Hash::make($user['password']);
        $this->confirmation_code = $user['confirmation_code'];
        $res = $this->save();
        return $res;
    }

    public function messages()
    {
      return $this->hasMany(Message::class);
    }

    public function getAll()
    {
        $array = $this::All();
        return $array;
    }

    public function get($id){
        $user = User::select('*')->where('id',$id)->get();
        return $user;
    }

    public function getEmail($email)
    {
        $user = User::select('*')->where('email', $email)->get();
        return $user;
    }

    public function deleteOne($id)
    {
        return User::destroy($id);
    }

    public function modifyNormal($usuario) {
        $id = auth()->user()->id;
        $buscar = User::find($id);
        $buscar->nombre = $usuario['nombre'];
        $buscar->apellidos = $usuario['apellidos'];
        $res = $buscar->save();
        return $res;
    }

    public function modifyPass($usuario) {
        $id = auth()->user()->id;
        $buscar = User::find($id);
        $buscar->password = Hash::make($usuario['new-password']);
        $res = $buscar->save();
        return $res;
    }

    public function activarPremium($id)
    {
        $buscar = User::find($id);
        $buscar->premium = 'S';
        return $buscar->save();
    }

    public function editUsuario($usuario)
    {
        $id = $usuario['id'];
        $buscar = User::find($id);
        $buscar->email = $usuario['email'];
        $buscar->nombre = $usuario['nombre'];
        $buscar->apellidos = $usuario['apellidos'];
        $buscar->tipo = $usuario['tipo'];
        $buscar->updated_at = date('Y-m-d');
        $res = $buscar->save();
        return $res;
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function buscarAjax($amigo)
	{
		$amigo = User::select('*')->join('amigos','users.id','=','amigos.email_usuario1')->where('users.nombre','like','%' .$amigo . '%')->get();
		return $amigo;
	}
	
	public function message()
    {
        return $this->hasMany(Message::class);
    }
}
