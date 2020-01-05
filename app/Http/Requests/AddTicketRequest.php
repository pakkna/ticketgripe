<?php

namespace App\Http\Requests;

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

            "ticket_type" => "required|string|unique:tickets,ticket_type,".$this->get('id'),
            "event_id" => "required|numeric",
            "quantity" => "required|numeric",
            "ticket_price" => "required|numeric",
            "currency" => "required",
            "selling_date" => "required|date",
            "untill_date" => "required|date",
            "max_ticket_per_order" => "required|numeric",
            "min_ticket_per_order" => "required|numeric",
            "short_note" => "required",
        ];
    }
}
