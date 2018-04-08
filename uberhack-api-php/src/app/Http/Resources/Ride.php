<?php

namespace App\Http\Resources;

class Ride extends BaseResource
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
            'modal_line_id',
        ]);

        $this->appendDateAttributes([
            'ride_at'
        ]);

        $this->includeRelation('modal_line', ModalLines::class);

        return $this->data;
    }
}
