<?php

namespace SastRicAtelier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'CI'=>'required|integer|max:11',
            'nombre'=>'required|max:45',
            'apellidos'=>'required|max:45',
            'telefono'=>'required|max:10',
            'zona'=>'required|max:45',
        ];
    }
}
