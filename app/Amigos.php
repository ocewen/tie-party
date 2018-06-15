<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Amigos extends Model
{
    protected $table = 'amigos';

	public function getMisAmigos($id) {
		$amigosArray = Amigos::select('*')->where('email_usuario1', $id)->orWhere('email_usuario2', $id)->where('estado', 'S')->get();
		foreach ($amigosArray as $usuario) {
			$sql = "*";
			if($usuario['email_usuario1'] == $id) {
				$usuario['relation'] = Hash::make($usuario['id']);
				$amigo2 = User::select($sql)->where('id', $usuario['email_usuario2'])->get();
				foreach($amigo2 as $pepe) {
					$usuario['email_user2'] = $pepe['email'];
					$usuario['foto'] = $pepe['id'];
				}
				$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $usuario['email_user2'] ) ) ) . "?d=" . urlencode("https://www.somewhere.com/homestar.jpg") . "&s=" . 240;
				if(file_exists('../public/images/users/' . $usuario['foto'])) {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/'. $usuario['foto'];
				} else if(@fopen($grav_url,"r")){
					$usuario['foto'] = $grav_url;
				} else {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/default.jpg';
				}
			} else {
				$usuario['relation'] = Hash::make($usuario['id']);
				$amigo = User::select($sql)->where('id', $usuario['email_usuario1'])->get();
				$usuario['email_user2'] = $amigo[0]['email'];
				$usuario['foto'] = $amigo[0]['id'];
				$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $usuario['email_user2'] ) ) ) . "?d=" . urlencode("https://www.somewhere.com/homestar.jpg") . "&s=" . 240;
				if(file_exists('../public/images/users/' . $usuario['foto'])) {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/'. $usuario['foto'];
				} else if(@fopen($grav_url,"r")){
					$usuario['foto'] = $grav_url;
				} else {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/default.jpg';
				}
			}
		}
		
		return $amigosArray;
	}
	
	public function getMisAmigosFiesta($id, $fiesta) {
		$amigosArray = Amigos::select('*')->where('email_usuario1', $id)->orWhere('email_usuario2', $id)->where('estado', 'S')->get();
		foreach ($amigosArray as $usuario) {
			$sql = "*";
			if($usuario['email_usuario1'] == $id) {
				$amigo = User::select($sql)->where('users.id', $usuario['email_usuario2'])->get();
				$usuario['email_user2'] = $amigo[0]['email'];
				$usuario['foto'] = $amigo[0]['id'];
				$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $usuario['email_user2'] ) ) ) . "?d=" . urlencode("https://www.somewhere.com/homestar.jpg") . "&s=" . 240;
				if(file_exists('../public/images/users/' . $usuario['foto'])) {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/'. $usuario['foto'];
				} else if(@fopen($grav_url,"r")){
					$usuario['foto'] = $grav_url;
				} else {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/default.jpg';
				}
			} else {
				$amigo = User::select($sql)->where('id', $usuario['email_usuario1'])->get();
				$usuario['email_user2'] = $amigo[0]['email'];
				$usuario['foto'] = $amigo[0]['id'];
				$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $usuario['email_user2'] ) ) ) . "?d=" . urlencode("https://www.somewhere.com/homestar.jpg") . "&s=" . 240;
				if(file_exists('../public/images/users/' . $usuario['foto'])) {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/'. $usuario['foto'];
				} else if(@fopen($grav_url,"r")){
					$usuario['foto'] = $grav_url;
				} else {
					$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/default.jpg';
				}
			}
		}
		
		return $amigosArray;
	}

	public function getCount()
	{
		return DB::table('amigos')->where(function ($query) {
                $query->where('email_usuario2', '=', auth()->user()->id);
            })->where('estado', 'N')->count();
	}

	public function aceptar($id) {
        $buscar = Amigos::find($id);
        $buscar->estado = 'S';
        $res = $buscar->save();
        return $res;
    }

	public function getSolicitudes()
	{
		$amigosArray = Amigos::select('*')->where('email_usuario2', auth()->user()->id)->where('estado', 'N')->get();
		foreach ($amigosArray as $usuario) {
			$sql = "*";
			$amigo = User::select($sql)->where('id', $usuario['email_usuario1'])->get();
			$usuario['email_user2'] = $amigo[0]['email'];
			$usuario['nombre_user2'] = $amigo[0]['nombre'];
			$usuario['apellidos_user2'] = $amigo[0]['apellidos'];
			$usuario['foto'] = $amigo[0]['id'];
			$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $usuario['email_user2'] ) ) ) . "?d=" . urlencode("https://www.somewhere.com/homestar.jpg") . "&s=" . 240;
			if(file_exists('../public/images/users/' . $usuario['foto'])) {
				$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/'. $usuario['foto'];
			} else if(@fopen($grav_url,"r")){
				$usuario['foto'] = $grav_url;
			} else {
				$usuario['foto'] = 'http://tie-party-krast.c9users.io/images/users/default.jpg';
			}
		}
		return $amigosArray;
	}

	public function buscarAmigo($id)
	{
		$amigo = Amigos::select('email_usuario1')->where('email_usuario1', $id)->where('email_usuario2', auth()->user()->id);
		$amigo2 = Amigos::select('email_usuario2')->where('email_usuario1', auth()->user()->id)->where('email_usuario2', $id);
		if($amigo === $id) {
			return $amigo;
		} else if($amigo2 === $id)
		{
			return $amigo2;
		} else {
			return 0;
		}
	}

	public function insertAmigos($amigo1, $amigo2)
	{
		$this->email_usuario1 = $amigo1;
        $this->email_usuario2 = $amigo2;
        $res = $this->save();
	}
	
	public function getByUser()
	{
		$amigosArray = Amigos::select('*')->where('email_usuario2', auth()->user()->id)->get();
		return $amigosArray;
	}
}
