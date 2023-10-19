<?php

namespace App\Http\Requests\Firewalls;

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
            'fir_nombre' => 'required|min:1|unique:firewalls',
            'fir_serial' => 'required|min:1|unique:firewalls',
            'fir_memoria' => 'required|min:1',
            'fir_cpu' => 'required|min:1',
            'fir_puertos' => 'required|min:1',
            'fir_macadd' => 'required|min:1',
            'fir_ip' => 'required|min:1|unique:firewalls',
            'fir_firmware' => 'required|min:1',
            'fir_alta' => 'required|min:1',
            'fir_estatus_id' => 'required|min:1',
            'fir_modelo_id' => 'required|min:1'
        ];
    }
}
