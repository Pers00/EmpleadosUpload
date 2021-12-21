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
    <!-- fin nuevo 1 -->
    
       <!-- Delete todos los productos ventana modal-->
    <div class="modal" id="modalDelete1" tabindex="-1">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h3 class="modal-title">Confirm delete all employees</h3>
    			</div>
    			<div class="modal-body">
    				<p>Are you sure you want to delete all saved employees?</p>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
    				<form id="modalDeleteResourceForm1" action="" method="post">
    					@method('delete') @csrf
    					<input type="submit" class="btn btn-primary cursor" value="Delete all employees" />
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- delete all products fin -->
     <div class="contenedorMensajes">
        <h1 style="margin-top:20px" class="tituloMio">Employees table</h1>
       @if (Session::has('message'))
        <div class="alert alert-{{ session()->get('type') }}" style="margin-top:20px;" role="alert">
          {{ session()->get('message') }}
        </div>
        
       @endif
       </div>
   

        <table class="table table-striped">
      <thead>
        <tr style="background-color:#177071;">
          <th scope="col"># Id</th>
          <th scope="col">Name</th>
          <th scope="col">surname</th>
          <th scope="col">email</th>
          <th scope="col">SHOW</th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
         <!--  el array ---- el valor quee obtiene al sacar el array-->
        @foreach ($empleados as $empleado)
             <tr>
                 <td class="id">
                     <!-- array de objetos, por tanto se saca el valor distinto  $resource['id'] -->
                     {{ $empleado->id }}
                 </td>
          
                 <td class="nombre" cl>
                     {{ $empleado->nombre }}
                 </td>
                 <td class="dinero">
                     {{ $empleado->apellidos }}
                 </td>
                 <td class="dinero" style="padding-right:160px">
                     {{ $empleado->email }}
                 </td>
                 <td class="tdLink">
                   <!-- no muestro nada nuevo, por que hay poco que enseñar -->
                     <a class="myLink" href="{{ url('empleado/'. $empleado->id ) }}">show</a>
                 </td>
                 <td class="tdLink1">
                  
                  <a class="myLink" href="{{ url('empleado/'. $empleado->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $empleado->nombre }}" data-url="{{ url('empleado/' . $empleado->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">delete</a>
                 </td>
             </tr>
    
        @endforeach
    
      </tbody>
    </table>
     <div class="contenedorBotones">
         <a  style="margin-bottom:20px;" href="{{ url('empleado/create') }}"><button class="botonNew2" style=" margin-top:15px;" class="btn btn-primary btn-lg" type="button">Add new employees</button></a>
     
         @isset ($empleado)
        <a href="javascript: void(0);" data-url="{{ url('empleado/flush/all' ) }}" data-bs-toggle="modal" data-bs-target="#modalDelete1"><button class="botonDelete" type="button">Delete all employees</button></a>
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
    