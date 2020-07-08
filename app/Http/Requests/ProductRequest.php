<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'price' => ['required'],
            'body' => ['required', 'min:10'],
            'photos.*'=> ['image'] //photos retorna uma array de imagens
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'min'      => 'Este campo deve ter no mínimo :min caracteres',
            'image'    => 'O arquivo não é uma imagem válida'
        ];
    }
}
