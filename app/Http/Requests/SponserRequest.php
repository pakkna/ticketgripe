<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponserRequest extends FormRequest
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
            "sponser_name" => "required|string",
            "sponser_logo" => "required",//|mimes:jpeg,bmp,png|dimensions:min_width=1280,min_height=518",
            "sponser_event_id" => "required|numeric",
        ];
    }
}
