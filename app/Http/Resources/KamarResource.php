<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KamarResource extends JsonResource
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
            'id'=>$this->id,
            'no_kamar'=>$this->no_kamar,
            'wifi'=>$this->wifi,
            'ac'=>$this->ac,
            'jumlah_kasur'=>$this->jumlah_kamar,
            'harga'=>$this->harga,
            'pengunjung'=>$this->pengunjungs

        ];
    }
}
