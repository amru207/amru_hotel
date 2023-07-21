<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'harga'=>$this->harga,
            'deskripsi'=>$this->deskripsi,
            'pengunjung'=>$this->pengunjungs
        ];
    }
}
