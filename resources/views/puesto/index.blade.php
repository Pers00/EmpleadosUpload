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
                <p>Confirm delete the employment "<span id="deletePuesto"></span>" ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
                <form id="modalDeleteResourceForm" action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Delete employment"/>
                </form>
              </div>
            </div>
          </div>
        </div>
    <!-- fin nuevo 1 -->
    <div id="modalDelete10"></div>
       <!-- Delete todos los productos ventana modal-->
    <div class="modal" id="modalDelete1" tabindex="-1">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h3 class="modal-title">Confirm delete all employments</h3>
    			</div>
    			<div class="modal-body">
    				<p>Are you sure you want to delete all saved employments?</p>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary cancelBtn" data-bs-dismiss="modal">Cancel</button>
    				<form id="modalDeleteResourceForm1" action="" method="post">
    					@method('delete') @csrf
    					<input type="submit" class="btn btn-primary cursor" value="Delete all employments" />
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- delete all products fin -->
        <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Employment table</h1>
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
          <th scope="col">Minimun</th>
          <th scope="col">Maximun</th>
          <th scope="col">SHOW</th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
         <!--  el array ---- el valor quee obtiene al sacar el array-->
        @foreach ($puestos as $puesto)
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
                 <td class="dinero" style="padding-right:280px">
                     {{ $puesto->maximo }}€
                 </td>
                 <td class="tdLink">
                   <!-- no muestro nada nuevo, por que hay poco que enseñar -->
                     <a class="myLink" href="{{ url('puesto/'. $puesto->id ) }}">show</a>
                 </td>
                 <td class="tdLink1">
                  
                  <a class="myLink" href="{{ url('puesto/'. $puesto->id. '/edit') }}">edit</a> 
                 </td>
                 <td class="tdLink2">
                    <a class="myLink" href="javascript: void(0);" data-name="{{ $puesto->nombre }}" data-url="{{ url('puesto/' . $puesto->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">delete</a>
                 </td>
             </tr>
    
        @endforeach
    
      </tbody>
    </table>
     <div class="contenedorBotones">
         <a  style="margin-bottom:20px;" href="{{ url('puesto/create') }}"><button class="botonNew2" style=" margin-top:15px;" class="btn btn-primary btn-lg" type="button">Add new employment</button></a>
     
         @isset ($puesto)
        <a href="javascript: void(0);" data-url="{{ url('puesto/flush/all' ) }}" data-bs-toggle="modal" data-bs-target="#modalDelete1"><button class="botonDelete" type="button">Delete all employments</button></a>
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
    