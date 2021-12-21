<?php

namespace App\Http\Controllers;

use App\Models\departamento;

use App\Models\empleado;

use Illuminate\Http\Request;

use App\Http\Requests\DepartamentoCreateRequest;
use App\Http\Requests\DepartamentoEditRequest;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
         $data=[];
        $data['departamentos'] = departamento::all();
        $data['empleados'] = empleado::all();
        return view('departamento.index', $data );//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $data['empleados'] = empleado::all();
        //$data['places'] = empleado::all();
        return view('departamento.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoCreateRequest $request)
    {
        $departamento = new departamento($request->all());
         
          
        $data=[];
        $data['message'] = 'New department ("' . $departamento->nombre . '")  has been insert successfully';
        $data['type'] = 'success';
        try {
            // lo que entra en la variable, es true si todo bien
            $result=$departamento->save();
            // enseñaría true en  $result = $place->save();
            //dd($result);
        } catch(\Exception $e) {
            $result=false;
            
            //$data['message'] = 'The place can not be inserted because it has a repeated name';
            //$data['type'] = 'danger';
            // el withinput le devolvemos lo que ha puesto, para que no los tenga que volver a poner
            return back()->withInput()->with($data);
        }
        if(!$result){
            $data['message'] = 'The department can not be inserted ';
            $data['type'] = 'danger';
            // el withinput le devolvemos lo que ha puesto, para que no los tenga que volver a poner
            return back()->withInput()->with($data);
        }
        
        return redirect('departamento')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(departamento $departamento, empleado $empleado)
    {
        //
        $data=[];
        $data['empleado'] = $empleado;
        $data['departamento']= $departamento;
        $data['empleados'] = empleado::all();
        
        
        return view ('departamento.show', $data);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(departamento $departamento)
    {
        //
        $data=[];
        $empleados = empleado::all();
        $cont=0;
        $data['departamento']= $departamento;
        // Hemos puesto el use (espacio de) arriba, poniendo el paquete de la clase
    $empleadosFinal=null;
        foreach($empleados as $empleadoUnico){
            // dd($empleadoUnico);
            if($empleadoUnico->iddepartamento == $departamento->id ){
                
                $empleadosFinal[$cont]= $empleadoUnico;
                $cont++;    
            }
        }
        
        $data['empleados'] = $empleadosFinal;
        return view ('departamento.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoEditRequest $request, departamento $departamento)
    {
        //
        $data = [];
        $data['message'] = 'The department ' . $departamento->name . ' has been updated successfully';
        $data['type'] = 'success';
       
        try{
            // 
            $result = $departamento->update($request->all());  
        } catch(\Exception $e) {
           $result=false;
        }
        
        //  Seria empleado $event = new Event($request->all());
        //$event->idperformance = $departamento->id;
        
        
        if(!$result){
            $data['message'] = 'The department can not be updated ';
            $data['type'] = 'danger';
       
            return back()->withInput()->with($data);
        }
        
        return redirect('departamento')->with($data);
        
        /* Y MAS COSAS ARRIBA QUE HE MODIFICADOO, MIRAR PRIMERA APP
        
        try {
            $result2 = $event->save();
        } catch(\Exception $e) {
            $data['message'] = 'The department has been edited, but not the event';
            $data['type'] = 'warning';
            return redirect('departamento/' . $departamento->id . '/edit')->withInput()->with($data);
        }
        $data['message'] = 'The department has been edited and its event has been inserted successfully';
        $data['type'] = 'success';
        if($request->has('btAdd')) {
            // He pulsado el boton Add Event
            return redirect('departamento/' . $departamento->id . '/edit')->with($data);
        } else {
            // He pulsado el boton Create
            return redirect('departamento')->with($data); 
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(departamento $departamento)
    {
        //
        $data=[];
        $data['message']= 'The department ' . $departamento->name . ' has been removed';
        $data['type']= 'success';
        $id=0;
        try{
            // Actualizar todas las IDS a 0
            empleado::where('iddepartamento', $departamento->id)->update(['iddepartamento'=>$id]);
            $departamento->delete();    
        }catch (\Exception $e){
            $data['message']= 'The department ' . $departamento->name . ' has been removed';
            $data['type']= 'danger';
        }
        
        
        return redirect('departamento')->with($data);
    }
    
    function flush(){ // 
         try { 
         // Borrar los datos de la tabla entera
        departamento::query()->delete();
         $data['message']= 'You have successfully deleted all departments!';
        $data['type']= 'success';
        return redirect('departamento')->with($data);
         } catch(\Exception $e) {
              $data['message']= 'Have a problem with delete all departments!';
            $data['type']= 'danger';
            return back()->withInput()->with($data);
       
        }
     }
}
