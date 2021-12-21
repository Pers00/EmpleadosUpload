<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoEditRequest extends FormRequest
{


      public function attributes()
    {
        return [
            'nombre' => 'name of the employee',
            'apellidos' => 'surname of the employee',
            'email' => 'email of the employee',
            'telefono' => 'telephone of the employee',
            'fechacontrato' => 'contract date of the employee',
            'idpuesto' => 'id of the employment',
            'iddepartamento' => 'id of the department',
            
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
        $date= 'The :attribute must be numeric date';
        
        return [
            'nombre.required'       => $required, // mensaje que vas a enseñar si falla esa regla
            'nombre.min'            => $min,
            'nombre.max'            => $max,

            'apellidos.required'       => $required, // mensaje que vas a enseñar si falla esa regla
            'apellidos.min'            => $min,
            'apellidos.max'            => $max,
            'apellidos.unique'         => $unique,
            
            'email.required'       => $required, // mensaje que vas a enseñar si falla esa regla
            'email.min'            => $min,
            'email.max'            => $max,
            'email.unique'         => $unique,
            
            
            'telefono.required'       => $required, // mensaje que vas a enseñar si falla esa regla
              'telefono.gte'            => $gte,
            'telefono.lte'            => $lte,
            'telefono.unique'         => $unique,
             'telefono.numerico'         => $numeric,
             
            'fechacontrato.required'       => $required, // mensaje que vas a enseñar si falla esa regla
            'fechacontrato.date'         => $date,
            
            'idpuesto.gte'            => $gte,
            'idpuesto.lte'            => $lte,
            
            'iddepartamento.gte'            => $gte,
            'iddepartamento.lte'            => $lte,
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
            'nombre'=> 'required|min:2|max:30|', 
            'apellidos' => 'required|min:2|max:30|',
            'email' => 'required|min:2|max:100|unique:empleado,email,'. $this->empleado->id,
            'telefono' => 'required|gte:10000000|lte:999999999999|numeric|unique:empleado,telefono,'. $this->empleado->id,
            'fechacontrato' => 'required|date',
            'idpuesto' => 'required|gte:0|lte:9999|numeric',
            'iddepartamento' => 'required|gte:0|lte:9999|numeric',
        ];
    }
}




