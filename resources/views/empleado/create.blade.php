@extends ('admin.base')
    
    @section('content')
    
             <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Create employee</h1>
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
    
          <form class="edit2" action="{{ url('empleado') }}" method="post" enctype="multipart/form-data">
            @csrf
      
            <!-- name IMPORTANTES (poner el nombre de la migración) -->
            <p class="pMio">You are going to create a new employee</p>
            <input class="input4Show" value="{{ old('nombre') }}" type="text" name="nombre" placeholder="Name of the employee" minlength="2" maxlength="30" required />
        
            <input class="input4Show" value="{{ old('apellidos')  }}" type="text" name="apellidos"  placeholder="Surname of the employee" minlength="2" maxlength="30" required />
         
            <input class="input1Show" value="{{ old('email')  }}" type="email" name="email" placeholder="Email of employee" minlength="2" maxlength="100" required />
            <div class="inputDiv">
                 <input class="input22Show" value="{{ old('telefono')  }}" type="text" name="telefono" placeholder="Telephone of employee" minlength="9" maxlength="12" required />
         
                <input class="input2Show" value="{{ old('fechacontrato') }}" type="date" name="fechacontrato" placeholder="Contract date" required />
           
                
                 <select  class="selectCreate"name="idpuesto" required >
                <option @if(old('idpuesto') == '')selected @endif  disabled value="">What employment? (*)</option>
                @foreach ($puestos as $puesto)
                    <!-- poner asi para poder pintar el selected -->
                    <option @if($puesto->id == old('idpuesto')) selected @endif value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                @endforeach
            </select>           
                

                <select  class="selectCreate"name="iddepartamento" required >
                    <option @if(old('iddepartamento') == '')selected @endif  disabled value="">What department? (*)</option>
                    @foreach ($departamentos as $departamento)
                        <!-- poner asi para poder pintar el selected -->
                        <option @if($departamento->id == old('iddepartamento')) selected @endif value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
                  <input class="file" type="file" name="photo"  accept="image/*">
                <input  class="botonNew1" type="submit" value="Create"/>
            </div>
          
        </form>
           
       
        <a href="{{ url('empleado/') }}"><button class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
@endsection