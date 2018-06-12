<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Herramientas extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre_herramienta' => $this->nombre_herramienta,
            'descripcion' => $this->descripcion,
            'created_at'=> $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
