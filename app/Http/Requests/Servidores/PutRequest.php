<?php

namespace App\Http\Requests\Servidores;

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
            'ser_nombre' => 'required|min:1|unique:servidores,ser_nombre,' . $this->route('servidore')->id . ',id',
            'ser_serial' => 'required|min:1|unique:servidores,ser_serial,' . $this->route('servidore')->id . ',id',
            'ser_macadd' => 'required|min:1',
            'ser_ip' => 'required|min:1|unique:servidores,ser_ip,' . $this->route('servidore')->id . ',id',
            'ser_so' => 'required|min:1',
            'ser_alta' => 'required|min:1',
            'ser_estatus_id' => 'required|min:1',
            'ser_modelo_id' => 'required|min:1'
        ];
    }
}
