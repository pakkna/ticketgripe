<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditEventRequest extends FormRequest
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
            "event_title" => "required|string",
            "status" => "required|string",
            "event_flyer" => "nullable|mimes:jpeg,bmp,png|dimensions:min_width=925,min_height=467",
            "event_logo" => "nullable|mimes:jpeg,bmp,png|dimensions:min_width=250,min_height=100",
            "custom_link" => "required|string",
            "custom_link" => Rule::unique('events')->ignore($this->custom_link, 'custom_link'),
            "category" => "required",
            "country" => "required",
            "city" => "required",
            "state" => "required",
            "zip" => "required|numeric|min:4",
            "address" => "required",
            "seat_number" => "required|numeric",
            "event_des" => "required",
            "start_time" => "required|date",
            "end_time" => "required|date",
        ];
    }
}
