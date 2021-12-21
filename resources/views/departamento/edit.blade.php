@extends ('admin.base')
    
    @section('content')
                <!-- nuevo 1  Ventana modal-->
        <div class="modal" id="modalDelete" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                
              </div>
              <div class="modal-body">
                <p>Confirm delete the department "<span id="deletePuesto"></span>" ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
                <form id="modalDeleteResourceForm" action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Delete department"/>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="modalDelete1"></div>
       <div class="contenedorMensajes">
           <h1 style="margin-top:20px" class="tituloMio">Edit department</h1>
       @if (Session::has('message'))
        <div class="alert alert-{{ session()->get('type') }}" style="margin-top:20px;" role="alert">
          {{ session()->get('message') }}
        </div>
       @endif
       
          @if ($errors->any())
         <div class="alert alert-danger quitar">
             <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
        @endif
        </div>
        
                     
          <form class="edit" action="{{ url('departamento/' . $departamento->id ) }}" method="post">
            @csrf
            @method('put')
            <!-- name IMPORTANTES (poner el nombre de la migración) -->
            <p class="pMio">You are going to edit department with #id <b>{{ $departamento->id }}</b></p>
            <input class="input1Show" value="{{ old('nombre', $departamento->nombre)  }}" type="text" name="nombre" placeholder="Name of the department" minlength="2" maxlength="70" required />
            <input class="input3Show" value="{{ old('localizacion',$departamento->localizacion) }}" type="text" name="localizacion" placeholder="Location of department" minlength="2" maxlength="100" required />
            
             <select  class="selectCreate"name="idempleadojefe" >
                <option @if(old('idempleadojefe') == '')selected @endif  disabled value="">Boss department (*)</option>
                <option  @if(old('idempleadojefe') == '')selected @endif value="">No boss</option>
                @if(@isset($empleados))
                @foreach ($empleados as $empleado)
                    <!-- poner asi para poder pintar el selected -->
                    <option @if($empleado->id == old('idempleadojefe',$departamento->idempleadojefe)) selected @endif value="{{ $empleado->id }}">{{ $empleado->apellidos }}  //  #{{ $empleado->id }}</option>
                @endforeach
                @endif
            </select>
            <input  class="botonNew1" type="submit" value="Edit"/>
        </form>
            <div class="contenedorBotones">
                <a href="{{ url()->previous()  }}"><button  class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
                 <div class="contenedorBotonesDos">
                    <a class="myLink" href="{{ url('departamento/'. $departamento->id ) }}"><button  class="botonNewNew" class="btn btn-primary btn-lg" type="button">Show</button></a>
                     <a class="myLink" href="javascript: void(0);" data-name="{{ $departamento->nombre }}" data-url="{{ url('departamento/' . $departamento->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete"><button  class="botonDelete" class="btn btn-primary btn-lg" type="button">delete</button></a> 
                 </div>
                 
             </div>
       
    @endsection
    
          
    @section('js')
    
        <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
       <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    @endsection
