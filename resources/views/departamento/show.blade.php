@extends ('admin.base')
    
    @section('content')
        <!-- nuevo 1  Ventana modal-->
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
        <!-- fin nuevo 1 -->
        
             <!-- nuevo 1  Ventana modal-->
        <div class="modal" id="modalDelete1" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                
              </div>
              <div class="modal-body">
                <p>Confirm delete the department "<span id="deletePuesto1"></span>" ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
                <form id="modalDeleteResourceForm1" action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Delete department"/>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- fin nuevo 1 -->
        
      <div class="modal" id="modalDelete10" tabindex="-1">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h3 class="modal-title">Confirm delete all departments</h3>
    			</div>
    			<div class="modal-body">
    				<p>Are you sure you want to delete all departments associated?</p>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
    				<form id="modalDeleteResourceForm10" action="" method="post">
    					@method('delete') @csrf
    					<input type="submit" class="btn btn-primary cursor" value="Delete all departments associated" />
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
        
       <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Show department</h1>
               @if (Session::has('message'))
                <div class="alert alert-{{ session()->get('type') }}" style="margin-top:20px;" role="alert">
                  {{ session()->get('message') }}
                </div>
              
               @endif
           
        </div>
       
    <table class="table table-striped">
      <thead>
        <tr style="background-color:#177071;">
          <th scope="col">#Id</th>
          <th scope="col">Name</th>
          <th scope="col">Location</th>
          <th scope="col">IDJEFE</th>
          <th scope="col"></th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>

             <tr>
                 <td class="id" style="padding-right:72px">
                     <!-- array de objetos, por tanto se saca el valor distinto  $resource['id'] -->
                     {{ $departamento->id }}
                 </td>
          
                 <td class="nombreD" cl>
                     {{ $departamento->nombre }}
                 </td>
                 <td class="tdD">
                     {{ $departamento->localizacion}}
                 </td>
                 <td class="tdD1" style="padding-right:414px">
                       {{ $departamento->idempleadojefe }}
                     @empty ($departamento->idempleadojefe) 0 @endempty
                  
                 </td>
                 <td class="tdLink" style="padding-right:94px !important">
                   <!-- no muestro nada nuevo, por que hay poco que enseñar -->
                     <a class="myLink" href="{{ url('departamento/'. $departamento->id ) }}"></a>
                 </td>
                 <td class="tdLink1" style="padding-right:87px !important">
                  
                  <a class="myLink" href="{{ url('departamento/'. $departamento->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2" style="padding-right:75px !important">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $departamento->nombre }}" data-url="{{ url('departamento/' . $departamento->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">delete</a>
                 </td>
             </tr>
    
    
      </tbody>
    </table>
   
    @if(count($departamento->empleados) > 0)
        <h1 style="margin-top:40px !important" class="tituloLista">List of <b>employees</b> associated with this department <h1>
      <table class="table table-striped">
      <thead>
        <tr style="background-color:#636363;">
          <th scope="col">#Id</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Email</th>
          <th scope="col">Telephone</th>
          <th scope="col">Contract date</th>
          <th scope="col">Id_Employee</th>
          <th scope="col">Department</th>
          <th scope="col"></th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
            @foreach($departamento->empleados as $empleado)
             <tr>
                 <td class="id1">
                     <!-- array de objetos, por tanto se saca el valor distinto  $resource['id'] -->
                     {{ $empleado->id }}
                 </td>
          
                 <td class="nombre1" cl>
                     {{ $empleado->nombre }}
                 </td>
                 <td class="apellidos">
                     {{ $empleado->apellidos }}
                 </td>
                 <td class="email" >
                     {{ $empleado->email }}
                 </td>
                 <td class="telefono">
                     {{ $empleado->telefono }}
                 </td>
                 <td class="apellidos">
                     {{ $empleado->fechacontrato }}
                 </td>
                 <td class="apellidos1">
                     {{ $empleado->idpuesto }}
                 </td>
                 <td class="apellidos1">
           
                      
                       @foreach($empleados as $empleado)
                    
                         @if ($empleado->id == $departamento->idempleadojefe)
                         {{ $departamento->nombre }}
                     
                         @endif
                    @endforeach
                 </td>
                 <td class="tdLink">
                 
                 </td>
                 <td class="tdLink1"  style="padding-right:100px!important;">
                  
                  <a class="myLink" href="{{ url('empleado/'. $empleado->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2"  style="padding-right:86px!important;">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $empleado->nombre }}" data-url="{{ url('empleado/'. $empleado->id .'/' . $departamento->id .  '/destroyShowDepartment') }}" data-bs-toggle="modal" data-bs-target="#modalDelete1">delete</a>
                 </td>
             </tr>
             @endforeach
    
      </tbody>
    </table>
    @else
     <h1 style="margin-top:40px !important" class="tituloLista">This department has <b>no employees</b></h1>
    @endif
    
    
    <div class="contenedorBotones">
     <a href="{{ url('departamento')  }}"><button class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
     @if(count($departamento->empleados) > 1)
     <a href="javascript: void(0);" data-url="{{ url('empleado/'. $departamento->id. '/flushDepartments' ) }}" data-bs-toggle="modal" data-bs-target="#modalDelete10"><button class="botonDelete" type="button">Delete all employees associated </button></a>
        @endif
    </div>
@endsection

    
   @section('js')
    <!-- nuevo 4  conectarJs-->
        <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
        <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ url('assets/admin/js/delete.js') }}"></script>
    <!-- fin nuevo 4 -->
    @endsection