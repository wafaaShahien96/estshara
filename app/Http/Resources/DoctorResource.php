<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'full_name' =>  $this->first_name . ' ' . $this->last_name,
            'email'  => $this->email,
            'phone' => $this->phone,
            'verification_code' => $this->verification_code,
            'created_at' => (string) $this->created_at->format('d/m/Y'),
            'updated_at' => (string) $this->updated_at->format('d/m/Y'),
        ];
    }
}