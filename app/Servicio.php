<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Servicio extends Model
{

	protected $table = 'servicio';

    protected $fillable = [
        'id','nombre','tipo','numero_personas', 'id_usuario'
    ];

    protected $hidden = [
        'id_usuario',
    ];

    public function insertServicio($servicio)
    {
        $this->nombre = $servicio['nombre'];
        $this->tipo = $servicio['servicio-type'];
        $this->numero_personas = $servicio['num'];
        $this->id_usuario = Auth::user()->id;
        $res = $this->save();
        return $res;
    }

    public function getAll()
    {
    	$array = Servicio::All();
    	foreach ($array as $usuario) {
			$sql = "nombre";
			$sql = 'SELECT * FROM servicio ser LEFT JOIN contratar cont ON(ser.id = cont.id_servicio) WHERE cont.id_fiesta = ' . $fiesta;
			$result = User::select($sql)->where('id', $usuario['id_usuario'])->get();
			$usuario['nombre_user'] = $result[0]['nombre'];
    	}
    	return $array;
    }
    
    public function getAllNotIn($fiesta)
    {   
        $sql = 'SELECT * FROM servicio ser LEFT JOIN contratar cont ON(ser.id = cont.id_servicio) WHERE cont.id_fiesta = ' . $fiesta;
        $servicios = DB::select($sql);
        $servicios = json_decode(json_encode($servicios), true);
        
        $arr = '';
        foreach($servicios as $servicio)
            $arr .= $servicio['id_servicio'] . ',';
            
        $arr = rtrim($arr,",");
            
        $sql = 'SELECT DISTINCT * FROM servicio WHERE id NOT IN (' . $arr . ')';
        $servicios = DB::select($sql);
        $servicios = json_decode(json_encode($servicios), true);
        return $servicios;
    }

    public function getAllProgram($id)
    {
        $sql = 'select ser.id, ser.nombre, ser.tipo, ser.numero_personas from servicio ser';
        $servicios = DB::select($sql);
        $servicios = json_decode(json_encode($servicios), true);
        return $servicios;
    }

    public function editServicio($servicio)
    {
        $id = $servicio['id'];
        $buscar = Servicio::find($id);
        $buscar->nombre = $servicio['nombre'];
        $buscar->descripcion = $servicio['descripcion'];
        $buscar->tipo = $servicio['tipo'];
        $buscar->numero_personas = $servicio['numero_personas'];
        $res = $buscar->save();
        return $res;
    }

    public function get($id){
        $servicio = Servicio::select('*')->where('id',$id)->get();
        return $servicio;
    }

    public function getEmpresa($id){
        $servicio = Servicio::select('*')->where('id_usuario',$id)->get();
        return $servicio;
    }

    public function deleteOne($id)
    {
    	return Servicio::destroy($id);
    }
    public function getByName($servicio){
        $id = Servicio::select('*')->where('nombre','like','%' .$servicio . '%')->get();
        return $id;
    }

    public function buscarAjax($servicio, $fiesta)
	{
        $idservicio = $this->getByName($servicio);
		$servicio = Servicio::select('*')->distinct('nombre')->where('servicio.nombre','like','%' .$servicio . '%')->get();
        return $servicio;
    }
    
    public function getFiesta($fiesta)
	{
        $sql = 'SELECT * FROM servicio ser LEFT JOIN contratar cont ON(ser.id = cont.id_servicio) WHERE cont.id_fiesta = ' . $fiesta;
        $servicios = DB::select($sql);
        $servicios = json_decode(json_encode($servicios), true);
        return $servicios;
	}
}
