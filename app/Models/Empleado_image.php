<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_image extends Model
{
    use HasFactory;
    
        protected $table ='empleado_image';
   
        public $timestamps= false;
        
        protected $fillable = ['idempleado', 'nombre', 'mimetype']; 

        function empleado(){
        return $this->belongsTo('App\Models\empleado', 'idempleado');
        }
}

