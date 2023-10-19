<?php

namespace App\Http\Requests\Switches;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'swi_nombre' => 'required|min:1|unique:switches',
            'swi_serial' => 'required|min:1|unique:switches',
            'swi_memoria' => 'required|min:1',
            'swi_cpu' => 'required|min:1',
            'swi_puertos' => 'required|min:1',
            'swi_macadd' => 'required|min:1',
            'swi_ip' => 'required|min:1|unique:switches',
            'swi_firmware' => 'required|min:1',
            'swi_alta' => 'required|min:1',
            'swi_estatus_id' => 'required|min:1',
            'swi_modelo_id' => 'required|min:1'
        ];
    }
}
