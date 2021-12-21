@extends ('admin.base')
    
    @section('content')
    
       <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Create department</h1>
                @if ($errors->any())
                 <div class="alert1 alert-danger">
                 <ul>
                 @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                     @endforeach
                 </ul>
                 </div>
                @endif
               @if (Session::has('message'))
                <div class="alert alert-{{ session()->get('type') }}" style="margin-top:20px;" role="alert">
                  {{ session()->get('message') }}
                </div>
              
               @endif
           
        </div>
       
            
          <form class="edit" action="{{ url('departamento') }}" method="post">
            @csrf
      
            <!-- name IMPORTANTES (poner el nombre de la migración) -->
            <p class="pMio" style="padding-left:26px !important">You are going to create a new deparment</p>
            <input class="input1Show" value="{{ old('nombre') }}" type="text" name="nombre" placeholder="Name of the department" minlength="2" maxlength="70" required />
          
            <input class="input3Show" value="{{ old('localizacion') }}" type="text" name="localizacion" placeholder="Location of deparment" minlength="2" maxlength="100"  required />
          
            <!-- <input class="input2Show" value="{{ old('idempleadojefe') }}" type="number" name="idempleadojefe" placeholder="idempleadojefe" min="110" step="0.01"  />-->
            <select  class="selectCreate"name="idempleadojefe" >
                <option @if(old('idempleadojefe') == '')selected @endif  disabled value="">Boss department (*)</option>
                <option  @if(old('idempleadojefe') == '')selected @endif value="">No boss</option>
                @foreach ($empleados as $empleado)
                    <!-- poner asi para poder pintar el selected -->
                    <option @if($empleado->id == old('idempleadojefe')) selected @endif value="{{ $empleado->id }}">{{ $empleado->apellidos }}  //  #{{ $empleado->id }}</option>
                @endforeach
            </select>
           <!-- <label><input type="checkbox" id="checkbox" name="idempleadojefe" value="idempleadojefe"> </label><br> -->
           
            <input  class="botonNew1" type="submit" value="Create"/>
        </form>
           
       
        <a href="{{ url('departamento/') }}"><button class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
@endsection