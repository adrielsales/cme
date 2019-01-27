<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'titulo' => "required",
            'sub_titulo' => "required",
            'tipo' => "required",
            'ativo' => "required",
            'imagem' => 'sometimes|image|dimensions:min_width=400|mimes:jpeg,jpg,png,bmp,gif,JPG,JPEG'
        ];
    }
}
