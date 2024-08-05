<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class CategoriaPostRequest extends FormRequest
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
            'categoria' => 'required|unique:categorias|max:255',
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
            'categoria.required' => 'Categoria é um campo obrigatório',
            'categoria.unique' => 'Categoria tem que ser única no banco de dados',
            'categoria.max' => 'Categoria tem o tamanho máximo de 255',
        ];
    }
}
