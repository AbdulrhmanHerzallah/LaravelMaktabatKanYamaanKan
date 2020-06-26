<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class CommitResource extends JsonResource
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
            'commit' => $this->commit,
            'name' => User::find($this->user_id)->name,
            'user_id' => $this->user_id,
            'updated_at' => $this->updated_at->diffForHumans()
        ];
    }
}
