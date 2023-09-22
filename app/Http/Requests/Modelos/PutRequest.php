<?php

namespace App\Http\Requests\Modelos;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
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
            "mod_nombre" => "required|min:1|unique:modelos,mod_nombre,".$this->route("modelo")->id,
            'mod_tipo_id' => 'required|min:1',
            'mod_marca_id' => 'required|min:1'
        ];
    }
}
