<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddTicketRequest extends FormRequest
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

            "ticket_type" => "required|string,".$this->event_id.",event_id",
            "ticket_type" => Rule::unique('tickets')->where('event_id', $this->event_id),
            "event_id" => "required|numeric",
            "quantity" => "required|numeric",
            "ticket_price" => "required|numeric",
            "currency" => "required",
            "selling_date" => "required|date",
            "untill_date" => "required|date",
            "max_ticket_per_order" => "required|numeric|min:1",
            "min_ticket_per_order" => "required|numeric|min:1",
            "short_note" => "required",
        ];
    }
}
