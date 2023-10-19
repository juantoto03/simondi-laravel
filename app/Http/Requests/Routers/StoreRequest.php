<?php

namespace App\Http\Requests\Routers;

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
            'rou_nombre' => 'required|min:1|unique:routers',
            'rou_serial' => 'required|min:1|unique:routers',
            'rou_memoria' => 'required|min:1',
            'rou_cpu' => 'required|min:1',
            'rou_puertos' => 'required|min:1',
            'rou_macadd' => 'required|min:1',
            'rou_ip' => 'required|min:1|unique:routers',
            'rou_firmware' => 'required|min:1',
            'rou_alta' => 'required|min:1',
            'rou_estatus_id' => 'required|min:1',
            'rou_modelo_id' => 'required|min:1'
        ];
    }
}
