<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionLog extends JsonResource
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
            'user' => $this->user->name ?? $this->user_name,
            'menu' => $this->menu->name ?? $this->menu_name,
            'type' => $this->permission->name?? $this->permission_name,
            'datetime' => $this->datetime,
        ];
    }
}
