<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Modal extends BaseResource
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
            'label',
        ]);

        $this->includeRelation('modal_lines', ModalLines::class);

        return $this->data;
    }
}
