<?php

namespace App\Http\Requests\RideRating;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'modal_line_id' => 'required|exists:modal_lines,id',
            'overall_rating' => 'required|integer|min:1|max:5',
            'modal_problem_id' => 'exists:modal_problems,id',
            'ride_at' => 'date',
            'observations' => 'string|max:65535',
        ];
    }
}
