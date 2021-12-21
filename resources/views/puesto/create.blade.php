@extends ('admin.base')
    
    @section('content')
    
         <div class="contenedorMensajes">
              <h1 style="margin-top:20px" class="tituloMio">Create employment</h1>
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
               
             
          <form class="edit" action="{{ url('puesto') }}" method="post">
            @csrf
      
            <!-- name IMPORTANTES (poner el nombre de la migración) -->
            <p class="pMio">You are going to create a new employment</p>
            <input class="input1Show" value="{{ old('nombre') }}" type="text" name="nombre" placeholder="Name of the employment" minlength="2" maxlength="70" required />
          
            <input class="input2Show" value="{{ old('minimo') }}" type="number" name="minimo" placeholder="Minimun of salary" min="965" max="999999" step="0.01" required />
        
            <input class="input2Show" value="{{ old('maximo') }}" type="number" name="maximo" placeholder="Maximun of salary" min="970" max="999999"  step="0.01" required />
        
            <input  class="botonNew1" type="submit" value="Create"/>
        </form>
           
       
        <a href="{{ url('puesto/') }}"><button class="botonNew" class="btn btn-primary btn-lg" type="button">Back</button></a>
@endsection