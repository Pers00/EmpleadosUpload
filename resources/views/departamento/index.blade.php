@extends ('admin.base')
    
    @section('content')
      <!-- nuevo 1  Ventana modal-->
        <div class="modal" id="modalDelete" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                <!--<ion-icon name="close-outline" data-bs-dismiss="modal" aria-label="Close"></ion-icon> -->
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
    
       <!-- Delete todos los productos ventana modal-->
    <div class="modal" id="modalDelete1" tabindex="-1">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h3 class="modal-title">Confirm delete all departments</h3>
    			</div>
    			<div class="modal-body">
    				<p>Are you sure you want to delete all saved departments?</p>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
    				<form id="modalDeleteResourceForm1" action="" method="post">
    					@method('delete') @csrf
    					<input type="submit" class="btn btn-primary cursor" value="Delete all departments" />
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- delete all products fin -->
    
         <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Departments table</h1>
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
          <th style="padding-right:120px" scope="col">Jefe</th>
          <th scope="col">SHOW</th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
         <!--  el array ---- el valor quee obtiene al sacar el array-->
        @foreach ($departamentos as $departamento)
             <tr>
                 <td class="id" style="padding-right:72px">
                     <!-- array de objetos, por tanto se saca el valor distinto  $resource['id'] -->
                     {{ $departamento->id }}
                 </td>
          
                 <td class="nombreD">
                     {{ $departamento->nombre }}
                 </td>
                 <td class="tdD">
                     
                     {{ $departamento->localizacion }}
                 </td>
                 <td class="tdD1" style="padding-right:380px">
                           @empty ($departamento->idempleadojefe)0  @endempty
                     @foreach($empleados as $empleado)
                    
                         @if ($empleado->id == $departamento->idempleadojefe)
                         {{ $empleado->nombre }}
                     
                         @endif
                    @endforeach
                 </td>
                 <td class="tdLink"style="padding-right:94px !important">
                   <!-- no muestro nada nuevo, por que hay poco que enseñar -->
                     <a class="myLink" href="{{ url('departamento/'. $departamento->id ) }}">show</a>
                 </td>
                 <td class="tdLink1"style="padding-right:87px !important">
                  
                  <a class="myLink" href="{{ url('departamento/'. $departamento->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2" style="padding-right:75px !important">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $departamento->nombre }}" data-url="{{ url('departamento/' . $departamento->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">delete</a>
                 </td>
             </tr>
    
        @endforeach
    
      </tbody>
    </table>
     <div class="contenedorBotones">
         <a  style="margin-bottom:20px;" href="{{ url('departamento/create') }}"><button class="botonNew2" style=" margin-top:15px;" class="btn btn-primary btn-lg" type="button">Add new department</button></a>
     
         @isset ($departamento)
        <a href="javascript: void(0);" data-url="{{ url('departamento/flush/all' ) }}" data-bs-toggle="modal" data-bs-target="#modalDelete1"><button class="botonDelete" type="button">Delete all departments</button></a>
        @endisset
      </div>
    @endsection
   
     
    
   @section('js')
    <!-- nuevo 4  conectarJs-->
        <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
        <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ url('assets/admin/js/delete.js') }}"></script>
    <!-- fin nuevo 4 -->
    @endsection
    