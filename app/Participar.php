<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participar extends Model
{

	protected $table = 'participar';

    public function registrame($idUser, $idFiesta)
	{
		$this->id_usuario = $idUser;
		$this->id_fiesta = $idFiesta;
		$res = $this->save();
		return $res;
	}

	public function getMi($id)
	{
		$participar = Participar::select('*')->where('id_fiesta', $id)->get();
		foreach ($participar as $part)
		{
			$sql = "*";
			$result = User::select($sql)->where('id', $part['id_usuario'])->get();
			$part['email'] = $result[0]['email'];
		}
		return $participar;
	}

	public function getParticipaciones()
	{
		$id = auth()->user()->id;
		$participar = Participar::select('*')->where('id_usuario',$id)->get();
		foreach ($participar as $fiesta) {
			$sql = "*";
			$result = Fiesta::select($sql)->where('id', $fiesta['id_fiesta'])->get();
			$fiesta['nombre_fiesta'] = $result[0]['nombre'];
			$fiesta['direccion'] = $result[0]['direccion'];
			$fiesta['fecha'] = $result[0]['fecha'];
			$fiesta['hora'] = $result[0]['hora'];
			$fiesta['tipo'] = $result[0]['tipo'];
			
			if(file_exists('../public/images/fiestas/' . $fiesta['id_fiesta'])) {
				$fiesta['foto'] = 'http://tie-party-krast.c9users.io/images/fiestas/'. $fiesta['id_fiesta'];
			} else {
				$fiesta['foto'] = 'http://tie-party-krast.c9users.io/images/public_images/fiesta2.jpg';
			}
		}
		return $participar;
	}

	public function getPartFies($id)
	{
		$participar = Participar::select('*')->where('id_fiesta',$id)->get();
		return $participar;
	}

	public function deletePart($fiesta)
	{
		$participar = Participar::select('*')->where('id', $fiesta)->get();
		return Participar::destroy($participar[0]['id']);
	}
}
