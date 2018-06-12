<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramientas extends Model
{
    protected $table = 'herramientas';

    protected $fillable = [
        'nombre_herramienta','descripcion',
    ];

    protected $hidden = [
        'id',
    ];

    public function insertHerramienta($herramienta)
    {
        $this->nombre_herramienta = $herramienta['nombre_herramienta'];
        $this->descripcion = $herramienta['descripcion'];
        $res = $this->save();
        return $res;
    }

    public function get($id){
        $herramienta = Herramientas::select('*')->where('id',$id)->get();
        return $herramienta;
    }

    public function getAll()
    {
    	$array = Herramientas::All();
    	return $array;
    }

    public function editHerramienta($herramienta)
    {
        $id = $herramienta['id'];
        $buscar = Herramientas::find($id);
        $buscar->nombre_herramienta = $herramienta['nombre_herramienta'];
        $buscar->descripcion = $herramienta['descripcion'];
        $res = $buscar->save();
        return $res;
    }

    public function deleteOne($id)
    {
    	return Herramientas::destroy($id);
    }
}
