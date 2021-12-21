<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
   use HasFactory;
    
    protected $table = 'empleado';

    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'fechacontrato', 'idpuesto', 'iddepartamento']; 
    
    function puesto(){
        return $this->belongsTo('App\Models\puesto', 'idpuesto');
    }
    function departamento(){
        return $this->belongsTo('App\Models\departamento', 'iddepartamento');
    }
    
    
}
