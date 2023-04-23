<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'product_id' => [
                'required',
                Rule::unique('bookings')->where(function ($query) {
                    return $query->where('client_id', request()->client_id)
                        ->where('product_id', request()->product_id);
                }),
                'exists:products,id'
            ],
            'booked_on' => 'sometimes|string',
        ];
    }
}
