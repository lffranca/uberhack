<?php

namespace App\Http\Resources;

class ModalProblem extends BaseResource
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
            'modal_id',
            'label',
        ]);

        $this->includeRelation('modal', Modal::class);

        return $this->data;
    }
}
