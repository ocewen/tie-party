<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contratar extends Model
{
    protected $table = 'contratar';

    public function insertarRelacion($id_usuario, $id_fiesta, $id_servicio)
    {
        $this->id_usuario = $id_usuario;
		$this->id_fiesta = $id_fiesta;
        $this->id_servicio = $id_servicio;
        $this->estado = "P";
        $this->save();
        return "true";
    }

    public function getProgram($id)
    {
        $contratos = Contratar::select('*')->where('id_fiesta',$id)->get();
        $contratos = json_decode(json_encode($contratos), true);
        if($contratos != null) {
            foreach ($contratos as $servicio) {
                $data[] = $servicio['id_servicio'];
            }
            $sql = "*";
            $sql = 'SELECT * from servicio where id NOT IN('. implode(",", $data) .')';
            $result = DB::select($sql);
            $result = json_decode(json_encode($result), true);
        } else {
            $sql = '*';
            $result = Servicio::select($sql)->get();
        }
        return $result;
    }

    public function getDatos($id)
    {
        $contratos = Contratar::select('*')->where('id_fiesta',$id)->get();
        foreach ($contratos as $servicio) {
			$sql = "nombre";
			$result = Servicio::select($sql)->where('id', $servicio['id_servicio'])->get();
			$servicio['nombre_servicio'] = $result[0]['nombre'];
        }
        return $contratos;
    }

    public function deleteCont($servicio, $fiesta)
	{
        $participar = Contratar::select('*')->where('id_servicio', $servicio)->where('id_fiesta', $fiesta)->get();
		return Contratar::destroy($participar[0]['id']);
	}
}
