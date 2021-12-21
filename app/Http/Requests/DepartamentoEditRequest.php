<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoEditRequest extends FormRequest
{
      public function attributes()
    {
        return [
            'nombre' => 'name of the department',
            'localizacion' => 'location of the department',
            'idempleadojefe' => 'id of the boss',
            
            ];
    }
    
    public function authorize()
    {
        return true;
    }
    
    public function messages() {
        $gte = 'The :attribute field must be greater than or equal to :value';
        $lte = 'The :attribute field must be less than or equal to :value';
        $max = 'The :attribute field cannot have more than :max characters';
        $min = 'The :attribute field cannot have more than :min characters';
        $required = 'The :attribute field is required';
        $unique = 'The :attribute field must be unique in the employment table';
        $numeric = 'The :attribute must be numeric';
        
        return [
            'nombre.required'       => $required, // mensaje que vas a enseñar si falla esa regla
            'nombre.min'            => $min,
            'nombre.max'            => $max,
            'nombre.unique'         => $unique,
            'localizacion.required'       => $required, // mensaje que vas a enseñar si falla esa regla
            'localizacion.min'            => $min,
            'localizacion.max'            => $max,
            'localizacion.unique'         => $unique,
            'idempleadojefe.gte'            => $gte,
            'idempleadojefe.lte'            => $lte,
            'idempleadojefe.numeric'        => $numeric,
           
        ];
        
}
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre'=> 'required|min:2|max:70|unique:departamento,nombre,'. $this->departamento->id,
            'localizacion' => 'required|min:2|max:100|',
      
        ];
    }
}
