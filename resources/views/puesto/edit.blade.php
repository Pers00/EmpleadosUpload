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
        <div id="modalDelete1"></div>
        
           <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Edit employment</h1>
                 
                  @if ($errors->any())
                 <div class="alert alert-danger quitar">
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
     
        
          <form class="edit" action="{{ url('puesto/' . $puesto->id ) }}" method="post">
            @csrf
            @method('put')
            <!-- name IMPORTANTES (poner el nombre de la migración) -->
            <p class="pMio">You are going to edit employment with #id <b>{{ $puesto->id }}</b></p>
            <input class="input1Show" value="{{ old('nombre', $puesto->nombre)  }}" type="text" name="nombre" placeholder="Name of the employment" minlength="2" maxlength="70" required />
            <input class="input2Show" value="{{ old('minimo',$puesto->minimo) }}" type="number" name="minimo" placeholder="Minimun of salary" min="965" max="999999" step="0.01" required />
            <input class="input2Show" value="{{ old('maximo',$puesto->maximo) }}" type="number" name="maximo" placeholder="Maximun of salary" min="970" max="999999"   step="0.01" required />
            <input  class="botonNew1" type="submit" value="Edit"/>
        </form>
            <div class="contenedorBotones">
                <a href="{{ url()->previous()  }}"><button  class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
                 <div class="contenedorBotonesDos">
                    <a class="myLink" href="{{ url('puesto/'. $puesto->id ) }}"><button  class="botonNewNew" class="btn btn-primary btn-lg" type="button">Show</button></a>
                     <a class="myLink" href="javascript: void(0);" data-name="{{ $puesto->nombre }}" data-url="{{ url('puesto/' . $puesto->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete"><button  class="botonDelete" class="btn btn-primary btn-lg" type="button">delete</button></a> 
                 </div>
                 
             </div>
    @endsection
      
       @section('js')
    
         <script src="{{ url('assets/admin/js/deletePuesto.js') }}"></script>
       <script src="{{ url('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        @endsection