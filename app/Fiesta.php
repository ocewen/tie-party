<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fiesta extends Model
{

	protected $table = 'fiesta';

	public function getAll()
	{
		$array = $this::All();

		foreach ($array as $usuario) {
			$sql = "nombre";
			$result = User::select($sql)->where('id', $usuario['id_usuario'])->get();
			$usuario['nombre_user'] = $result[0]['nombre'];
		}
		return $array;
	}
	
	public function compareId($fiesta)
	{
		$sql = Fiesta::select('*')->where('id', $fiesta)->where('id_usuario', auth()->user()->id)->get();
		return $sql;
	}

	public function get($id){
		$fiesta = Fiesta::select('*')->where('id',$id)->get();
		return $fiesta;
	}

	public function getByName($id){
		$fiesta = Fiesta::select('*')->where('nombre',$id)->get();
		return $fiesta;
	}

	public function countId()
	{
		$id = auth()->user()->id;
		$fiesta = Fiesta::select('*')->where('id_usuario', $id)->get();
		$num_rows = count($fiesta);
		return $num_rows;
	}


	public function getPublic(){
		$tipo = 'N';
		$fiesta = Fiesta::select('*')->where('privada',$tipo)->get();
		return $fiesta;
	}

	public function getUserFiesta($id) {
		$date = date('Y-m-d');
		$sql = 'select * from fiesta where id_usuario = '.$id.' AND ((fecha >= "'.$date.'") OR (fecha IS NULL))';
        $fiestasArray = DB::select($sql);
        $result = json_decode(json_encode($fiestasArray), true);
        for($i = 0; $i < sizeof($result); $i++) {
        	if(file_exists('../public/images/fiestas/' . $result[$i]['id']))
        	{
        		$result[$i]['foto'] = '/images/fiestas/' . $result[$i]['id'];
        	} else {
        		$result[$i]['foto'] = '/images/public_images/fiesta2';
        	}
        }
        
		return $result;
	}

	public function getUserFiestaPasadas($id) {
		$date = date('Y-m-d');
		$fiestasArray = Fiesta::select('*')->where('id_usuario', $id)->where('fecha','<', '"'.$date.'"')->get();
		return $fiestasArray;
	}

	public function insertFiesta($fiesta)
	{
		if($fiesta['privada'] == 'No') {$fiesta['privada'] = 'N';} else {$fiesta['privada'] = 'S';}
		$this->nombre = $fiesta['nombre'];
		$this->direccion = $fiesta['direccion'];
		$this->fecha = $fiesta['fecha'];
		$this->hora = $fiesta['hora'];
		$this->id_usuario = $fiesta['id_usuario'];
		$this->tipo = $fiesta['tipo'];
		$this->privada = $fiesta['privada'];
		$res = $this->save();
		return $res;
	}

	public function act($id, $date, $time, $direccion)
	{
		$fiesta = Fiesta::find($id);
		$fiesta->fecha = $date;
		$fiesta->hora = $time;
		$fiesta->direccion = $direccion;

		$fiesta->save();
	}

	public function crear($fiesta)
	{
		$this->nombre = $fiesta['nombre'];
		$this->id_usuario = auth()->user()->id;
		$this->tipo = $fiesta['party-type'];
		$obj = $this->save();
		return $this;
	}

	public function deleteOne($id)
	{
		return Fiesta::destroy($id);
	}

	public function editFiesta($fiesta)
	{
		$id = $fiesta['id'];
		$buscar = Fiesta::find($id);
		$buscar->nombre = $fiesta['nombre'];
		$buscar->direccion = $fiesta['direccion'];
		$buscar->fecha = $fiesta['fecha'];
		$buscar->hora = $fiesta['hora'];
		$buscar->tipo = $fiesta['tipo'];
		$buscar->privada = $fiesta['privada'];
		$res = $buscar->save();
		return $res;
	}

	public function buscarAjax($fiesta)
	{
		$fiesta = Fiesta::select('*')->where('nombre','like','%' .$fiesta . '%')->where('privada','N')->limit(5)->get();
		return $fiesta;
	}
}
