<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;
    
    protected $table ='departamento';
   
    public $timestamps= false;
    
    protected $fillable = ['nombre', 'localizacion','idempleadojefe'];
    
    
    function empleados(){
        return $this->hasMany('App\Models\empleado', 'iddepartamento');
    }
}
