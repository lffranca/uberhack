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

        /*
         * Email, CPF fields and rides relationship should
         * only be shown to the user.
         */
        if (\Auth::id() === $this->resource->id) {
            $this->appendRawAttributes([
                'email',
                'cpf'
            ]);
            
            $this->includeRelation('rides', Ride::class);
        }

        return $this->data;
    }
}
