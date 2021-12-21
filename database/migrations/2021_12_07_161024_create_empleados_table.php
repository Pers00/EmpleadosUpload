<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre',30);  
            $table->string('apellidos',30);
            $table->string('email',100)->unique(); 
            $table->string('telefono',12)->unique();  
            $table->date('fechacontrato')->useCurrent();
            $table->bigInteger('idpuesto')->unsigned();
            $table->bigInteger('iddepartamento')->unsigned();
            
            $table->timestamps();
        });
        
        Schema::table('departamento', function(Blueprint $table) {
        $table->foreign('idempleadojefe')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
