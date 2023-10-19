<?php

namespace App\Http\Requests\Aps;

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
            'ap_nombre' => 'required|min:1|unique:aps',
            'ap_serial' => 'required|min:1|unique:aps',
            'ap_macadd' => 'required|min:1',
            'ap_ip' => 'required|min:1|unique:aps',
            'ap_firmware' => 'required|min:1',
            'ap_alta' => 'required|min:1',
            'ap_estatus_id' => 'required|min:1',
            'ap_modelo_id' => 'required|min:1'
        ];
    }
}
