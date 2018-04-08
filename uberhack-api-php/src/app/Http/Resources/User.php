<?php

namespace App\Http\Resources;

class User extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->appendRawAttributes([
            'id',
            'name',
        ]);

        if (\Auth::id() === $this->resource->id) {
            $this->appendRawAttributes([
                'email',
                'cpf'
            ]);
        }

        return $this->data;
    }
}
