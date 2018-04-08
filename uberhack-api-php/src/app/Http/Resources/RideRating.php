<?php

namespace App\Http\Resources;

class RideRating extends BaseResource
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
            'ride_id',
            'modal_problem_id',
            'overall_rating',
            'observations',
        ]);

        $this->includeRelation('ride', Ride::class);
        $this->includeRelation('modal_problem', ModalProblem::class);

        return $this->data;
    }
}
