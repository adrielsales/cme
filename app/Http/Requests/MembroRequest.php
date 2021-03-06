<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroRequest extends FormRequest
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
            'nome' => "required",
            'foto' => 'sometimes|image|dimensions:min_width=400|mimes:jpeg,jpg,png,bmp,gif,JPG'
        ];
    }
}
