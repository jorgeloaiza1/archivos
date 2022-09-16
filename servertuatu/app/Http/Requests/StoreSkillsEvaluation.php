<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillsEvaluation extends FormRequest
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
        $rules = [];
        $valitation = 'required|in:1,2,3,4,5';
        //dd( $this, $this->request->has("actitud"), $this->request->has("comunicacion"));
        if( $this->request->has("actitud")){
            $rules = [
                'velocidad' => $valitation,
                'actitud' => $valitation,
                'transformacion' => $valitation,
                'relaciones' => $valitation,
                'resultados' => $valitation,            
            ];
        }else{
            $rules = [
                'comunicacion' => $valitation,
                'conocimiento' => $valitation,
                'liderazgo' => $valitation,
                'relaciones' => $valitation,
                'resultados' => $valitation,            
            ];
        }
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'comunicacion.required' => 'La competencia "Comunicación" debe tener calificación',
            'conocimiento.required' => 'La competencia "Conocimiento" debe tener calificación',
            'liderazgo.required' => 'La competencia "Liderazgo" debe tener calificación',
            'relaciones.required' => 'La competencia "Relaciones" debe tener calificación',
            'resultados.required' => 'La competencia "Resultados" debe tener calificación',
            'actitud.required' => 'La competencia "Actitud Glüker" debe tener calificación',
            'velocidad.required' => 'La competencia "Velocidad" debe tener calificación',
            'transformacion.required' => 'La competencia "Transformación" debe tener calificación'
        ];
    }
}
