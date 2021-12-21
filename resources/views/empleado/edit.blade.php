@extends ('admin.base')
    
    @section('content')
         <div class="modal" id="modalDelete" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                
              </div>
              <div class="modal-body">
                <p>Confirm delete the employee "<span id="deletePuesto"></span>" ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
                <form id="modalDeleteResourceForm" action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Delete employee"/>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal" id="modalDelete2" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                
              </div>
              <div class="modal-body">
                <p>Confirm delete the image?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
                <form id="modalDeleteResourceForm2" action="" method="post">
                   @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Delete image"/>
                </form>
              </div>
            </div>
          </div>
        </div>
        
     
     <div class="contenedorMensajes">
           <h1 style="margin-top:20px" class="tituloMio">Edit employee</h1>
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
        
        <!-- encytype para que funcione -->
          <form id="editForm" class="edit2" action="{{ url('empleado/' . $empleado->id ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <!-- name IMPORTANTES (poner el nombre de la migración) -->
            <p class="pMio">You are going to edit employee with #id <b>{{ $empleado->id }}</b></p>
             <input class="input4Show" value="{{ old('nombre', $empleado->nombre) }}" type="text" name="nombre" placeholder="Name of the employee" minlength="2" maxlength="30" required />
        
            <input class="input4Show" value="{{ old('apellidos', $empleado->apellidos) }}" type="text" name="apellidos"  placeholder="Surname of the employee" minlength="2" maxlength="30" required />
         
            <input class="input1Show" value="{{ old('email', $empleado->email) }}" type="email" name="email" placeholder="Email of employee" minlength="2" maxlength="100" required />
            <div class="inputDiv">
                 <input class="input22Show" value="{{ old('telefono', $empleado->telefono) }}" type="text" name="telefono" placeholder="Telephone of employee" minlength="9" maxlength="12" required />
         
                <input class="input2Show" value="{{ old('fechacontrato', $empleado->fechacontrato)  }}" type="date" name="fechacontrato" placeholder="Contract date" required />
           
                
                 <select  class="selectCreate"name="idpuesto" required >
                <option @if(old('idpuesto') == '')selected @endif  disabled value="">What employment? (*)</option>
                @foreach ($puestos as $puesto)
                    <!-- poner asi para poder pintar el selected -->
                    <option @if($puesto->id == old('idpuesto', $empleado->idpuesto)) selected @endif value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                @endforeach
            </select>           
                

                <select  class="selectCreate"name="iddepartamento" required >
                    <option @if(old('iddepartamento') == '')selected @endif  disabled value="">What department? (*)</option>
                    @foreach ($departamentos as $departamento)
                        <!-- poner asi para poder pintar el selected -->
                        <option @if($departamento->id == old('iddepartamento', $empleado->iddepartamento)) selected @endif value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
                <input class="file" type="file" name="photo" form="editForm" accept="image/*">
                <input  class="botonNew1" type="submit" value="Edit"/>
            </div>
           
            
        </form>
              <div class="contenedorBotones">
                <a href="{{ url()->previous()  }}"><button  class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
                 <div class="contenedorBotonesDos">
                    <a class="myLink" href="{{ url('empleado/'. $empleado->id ) }}"><button  class="botonNewNew" class="btn btn-primary btn-lg" type="button">Show</button></a>
                     <a class="myLink" href="javascript: void(0);" data-name="{{ $empleado->nombre }}" data-url="{{ url('empleado/' . $empleado->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete"><button  class="botonDelete" class="btn btn-primary btn-lg" type="button">delete</button></a> 
                     
                 </div>
                 
             </div>
            @if($empleadoImagen=='')
                <div class="contenedorImagen">
                    <img src="{{ asset('storage/default/default.jpg') }}">
                <p>Image of {{ $empleado->nombre }}</p>
                </div>
              @else
              
              <div class="contenedorImagen">
                  <img src="{{ asset('storage/imagesEmpleados/' . $empleado->id. '/' . $empleadoImagen->nombre) }}">
                  <p >Image of {{ $empleado->nombre }}</p>
                  <a class="myLink" href="javascript: void(0);" data-name="{{ $empleado->nombre }}" data-url="{{ url('empleado/' . $empleado->id . '/destroyImage') }}" data-bs-toggle="modal" data-bs-target="#modalDelete2"><button  class="botonDelete" class="btn btn-primary btn-lg" type="button">delete</button></a> 
              </div>
              @endif 
    
    @endsection
    
      @section('js')
    
        <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
        <script src="{{ url('assets/admin/js/deleteImage.js') }}"></script>
       <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    @endsection
    
    
