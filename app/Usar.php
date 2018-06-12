<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usar extends Model
{

    protected $table = 'usar';

    public function insertarRelacion($id_fiesta, $id_herramienta)
    {
        $this->id_fiesta = $id_fiesta;
        $this->id_herramienta = $id_herramienta;
        $this->save();
        return "true";
    }

    public function getProgram($id)
    {
        $usos = Usar::select('*')->where('id_fiesta',$id)->get();
        $usos = json_decode(json_encode($usos), true);
        if($usos != null) {
            foreach ($usos as $usar) {
                $data[] = $usar['id_herramienta'];
            }
            $sql = "*";
            $sql = 'SELECT * from herramientas where id NOT IN('. implode(",", $data) .')';
            $result = DB::select($sql);
            $result = json_decode(json_encode($result), true);
        } else {
            $sql = '*';
            $result = Herramientas::select($sql)->get();
        }
        return $result;
    }

    public function getDatos($id)
    {
        $usos = Usar::select('*')->where('id_fiesta',$id)->get();
        foreach ($usos as $herramienta) {
			$sql = "nombre_herramienta";
			$result = Herramientas::select($sql)->where('id', $herramienta['id_herramienta'])->get();
			$herramienta['nombre'] = $result[0]['nombre_herramienta'];
        }
        return $usos;
    }
}
