<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class PuestoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
      public function attributes()
    {
        return [
            'nombre' => 'name of the employment',
            'minimo' => 'minimum salary',
            'maximo' => 'maximun salary',
            
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
            'minimo.required'       => $required,
            'minimo.numeric'        => $numeric,
            'minimo.gte'            => $gte,
            'minimo.lte'            => $lte,
            'maximo.required'       => $required,
            'maximo.gte'            => $gte,
            'maximo.lte'            => $lte,
            'maximo.numeric'        => $numeric,
           
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
            'nombre'=> 'required|min:2|max:70|unique:puesto,nombre', 
            'minimo' => 'required|gte:965.00|lte:99999.99|numeric',
            'maximo' => 'required|gte:970.00|lte:99999.99|numeric', 
        ];
    }
}
