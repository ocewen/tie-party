<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Servicio extends JsonResource
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
            'tipo' => $this->tipo,
            'numero_personas' => $this->numero_personas,
            'id_usuario' => $this->belongsTo('App\User', 'nombre'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
