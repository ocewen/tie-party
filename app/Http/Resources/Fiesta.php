<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Fiesta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'id_usuario' => $this->belongsTo('App\User', 'nombre'),
            'tipo' => $this->tipo,
            'privada' => $this->privada,
            'created_at'=> $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
