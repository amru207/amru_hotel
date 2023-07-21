<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PengunjungResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'nama'=>$this->nama,
            'alamat'=>$this->alamat,
            'email'=>$this->email,
            'no_hp'=>$this->no_hp,
            'booking_info'=>$this->hotel
        ];
    }
}
