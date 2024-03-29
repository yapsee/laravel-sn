<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResourceMobile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id, 
            "nomComplet"=> $this->nom ."  ". $this->prenom ,
						"email "=> $this->email

        ];
    }
}

// This is a DTO want to provide to our web frontend developer