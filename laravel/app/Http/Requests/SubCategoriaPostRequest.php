<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class SubCategoriaPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subcategoria' => 'required|unique:subcategorias|max:255',
        ];
    }

    /**
     *
     * @param Validator $validator
     * 
     * 
     */
    public function after(Validator $validator)
    {
        if ($validator->fails()) {
            $errors = $validator->errors();
            throw new HttpResponseException(response()->json([
                'success' => false,
                'errors' => $errors
            ], 422));
        }
        return function () {
        };
    }


    public function messages(): array
    {
        return [
            'subcategoria.unique' => 'subcategoria tem que ser única no banco de dados',
            'subcategoria.max' => 'subcategoria tem o tamanho máximo de 255',
        ];
    }
}
