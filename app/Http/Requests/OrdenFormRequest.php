<?php

namespace SastRicAtelier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenFormRequest extends FormRequest
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
            'cantidad'=>'required|integer',
            'precioUnitario'=>'required|min:10',
            'saldo'=>'required',
            'fecha_inicio'=>'required',
            'fecha_entrega'=>'required',
        ];
    }
}
