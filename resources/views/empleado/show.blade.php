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
        
             <!-- nuevo 1  Ventana modal-->
        <div class="modal" id="modalDelete1" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                
              </div>
              <div class="modal-body">
                <p>Confirm delete the employment "<span id="deletePuesto1"></span>" ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
                <form id="modalDeleteResourceForm1" action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Delete employment"/>
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
    				<h3 class="modal-title">Confirm delete all employments</h3>
    			</div>
    			<div class="modal-body">
    				<p>Are you sure you want to delete all employments associated?</p>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
    				<form id="modalDeleteResourceForm10" action="" method="post">
    					@method('delete') @csrf
    					<input type="submit" class="btn btn-primary cursor" value="Delete all employments associated" />
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
           <h1 style="margin-top:20px" class="tituloMio">Show employee</h1>
       @if (Session::has('message'))
        <div class="alert alert-{{ session()->get('type') }}" style="margin-top:20px;" role="alert">
          {{ session()->get('message') }}
        </div>
       @endif
       
     <table class="table table-striped">
      <thead>
        <tr style="background-color:#177071;">
          <th scope="col">#Id</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Email</th>
          <th scope="col">Telephone</th>
          <th scope="col">Contract date</th>
          <th scope="col">Id_Employment</th>
          <th scope="col">Id_Department</th>
          <th scope="col"></th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
     
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
                     {{ $empleado->iddepartamento }}
                 </td>
                 <td class="tdLink">
                 
                 </td>
                 <td class="tdLink1"  style="padding-right:100px!important;">
                  
                  <a class="myLink" href="{{ url('empleado/'. $empleado->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2"  style="padding-right:86px!important;">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $empleado->nombre }}" data-url="{{ url('empleado/'. $empleado->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete1">delete</a>
                 </td>
             </tr>
        
    
      </tbody>
    </table>
    
        @if($empleadoImagen=='')
                <div class="contenedorImagen1">
                    <img src="{{ asset('storage/default/default.jpg') }}">
                <p>Image of {{ $empleado->nombre }}</p>
                </div>
              @else
              
              <div class="contenedorImagen1">
                  <img src="{{ asset('storage/imagesEmpleados/' . $empleado->id. '/' . $empleadoImagen->nombre) }}">
                  <p >Image of {{ $empleado->nombre }}</p>
              </div>
              @endif  
   
   
    @foreach($puestos as $puesto)
        @if($empleado->idpuesto == $puesto->id)
           <h1 style="margin-top:40px !important" class="tituloLista">List of <b>employees</b> associated with this<b> employment </b><h1>
      <table class="table table-striped">
      <thead>
        <tr style="background-color:#636363;">
          <th scope="col"># Id</th>
          <th scope="col">Name</th>
          <th scope="col">Minimun</th>
          <th scope="col">Maximun</th>
          <th scope="col"></th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
           
             <tr>
                  <td class="id">
                     <!-- array de objetos, por tanto se saca el valor distinto  $resource['id'] -->
                     {{ $puesto->id }}
                 </td>
          
                 <td class="nombre" cl>
                     {{ $puesto->nombre }}
                 </td>
                 <td class="dinero">
                     {{ $puesto->minimo }}€
                 </td>
                 <td class="dinero" style="padding-right:160px">
                     {{ $puesto->maximo }}€
                 </td>
                 <td class="tdLink">
                   <!-- no muestro nada nuevo, por que hay poco que enseñar -->
                     <a class="myLink" href="{{ url('puesto/'. $puesto->id ) }}"></a>
                 </td>
                 <td class="tdLink1">
                  
                  <a class="myLink" href="{{ url('puesto/'. $puesto->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $puesto->nombre }}" data-url="{{ url('puesto/' . $puesto->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">delete</a>
                 </td>
             </tr>
         
    
      </tbody>
    </table>
      @else
    <!-- <h1 style="margin-top:40px !important" class="tituloLista">This employee has <b>no employments</b></h1> -->
        @endif   
    @endforeach 
          
        @foreach($departamentos as $departamento)
          @if($empleado->iddepartamento == $departamento->id)
    
            <h1 style="margin-top:40px !important" class="tituloLista">List of <b>employees</b> associated with this<b> departments</b> <h1>
      <table class="table table-striped">
      <thead>
        <tr style="background-color:#636363;">
          <th scope="col">#Id</th>
          <th scope="col">Name</th>
          <th scope="col">Location</th>
          <th scope="col">JEFE</th>
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
                        @isset($empleado->iddepartamento)
                       {{ $empleado->nombre }}
                       @endisset
                 
                    
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

    

  
   
    

   <!-- <h1 style="margin-top:40px !important" class="tituloLista">This employee has <b>no departments</b></h1>  -->
    
   
   
    @endif
  



        
   @endforeach
      
  
 
       <a href="{{ url('empleado')  }}"><button class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>

    @endsection
    
   @section('js')
    <!-- nuevo 4  conectarJs-->
        <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
        <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ url('assets/admin/js/delete.js') }}"></script>
    <!-- fin nuevo 4 -->
    @endsection