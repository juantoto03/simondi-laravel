<?php

namespace App\Http\Requests\Cores;

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
            'cor_nombre' => 'required|min:1|unique:cores,cor_nombre,' . $this->route('core')->id,
            'cor_serial' => 'required|min:1|unique:cores,cor_serial,' . $this->route('core')->id,
            'cor_memoria' => 'required|min:1',
            'cor_cpu' => 'required|min:1',
            'cor_puertos' => 'required|min:1',
            'cor_macadd' => 'required|min:1',
            'cor_ip' => 'required|min:1|unique:cores,cor_ip,' . $this->route('core')->id,
            'cor_firmware' => 'required|min:1',
            'cor_alta' => 'required|min:1',
            'cor_estatus_id' => 'required|min:1',
            'cor_modelo_id' => 'required|min:1'
        ];
    }
}
