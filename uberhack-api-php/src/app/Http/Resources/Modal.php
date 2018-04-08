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

        $this->includeRelation('modal_lines', ModalLine::class);
        $this->includeRelation('modal_problems', ModalProblem::class);

        return $this->data;
    }
}
