<?php

namespace SilverDC\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlaneacionRequest extends FormRequest
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
            'nombre' => 'required',
            'fecha' => 'required|date|after_or_equal:today',
            'avanceTotal' => 'required',
            'avancePorDia' => 'required',
            'gestion' => 'required'
        ];
    }
}
