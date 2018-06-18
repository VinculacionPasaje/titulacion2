<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaCalendarioRequest2 extends FormRequest
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
            'dia_semana'=>'required|max:255',
            'hora_inicio'=>'required',
            'hora_fin'=>'required|after:hora_inicio',
             'asignatura_semestre_id'=>'required',
            

        ];
    }
}
