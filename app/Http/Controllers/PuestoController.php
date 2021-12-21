<?php

namespace App\Http\Controllers;

use App\Models\puesto;
use App\Models\empleado;
use App\Models\departamento;
use Illuminate\Http\Request;

use App\Http\Requests\PuestoCreateRequest;
use App\Http\Requests\PuestoEditRequest;



class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=[];
        // cogemos de la bdd todo
    
        $data['puestos'] = puesto::all();
        return view('puesto.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuestoCreateRequest $request)
    {
        // HAY  QUE HACER LA VALIDACION
        
        $puesto = new puesto($request->all());
         
        $data=[];
        $data['message'] = 'New employment ("' . $puesto->nombre . '") has been insert successfully';
        $data['type'] = 'success';
        
        try {
            $result=$puesto->save();
    
        } catch(\Exception $e) {
            $result=false;
            
            $data['message'] = 'The employment can not be inserted because it has a repeated name';
            $data['type'] = 'danger';
        
            return back()->withInput()->with($data);
        }
        if(!$result){
            $data['message'] = 'The employment can not be inserted ';
            $data['type'] = 'danger';
   
            return back()->withInput()->with($data);
        }
        
        return redirect('puesto')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(puesto $puesto, empleado $empleado)
    {
        //
        $data=[];
        $data['empleado'] = $empleado;
        $data['puesto']= $puesto;
        $data['departamentos']= departamento::all();
        return view ('puesto.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(puesto $puesto)
    {
       
        $data=[];
        $data['puesto']= $puesto;
        
        
        return view ('puesto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(PuestoEditRequest $request, puesto $puesto)
    {
        
       
        
        $data=[];
        $data['message'] = 'The employment "'.$puesto->nombre .'" has been updated successfully';
        $data['type'] = 'success';
        
        try {
          
            $result=$puesto->update($request->all() );
        
        } catch(\Exception $e) {
            $result=false;
            
            $data['message'] = 'The place can not be inserted because it has a repeated name';
            $data['type'] = 'danger';
       
        }
        if(!$result){
            $data['message'] = 'The employment can not be updated ';
            $data['type'] = 'danger';
       
            return back()->withInput()->with($data);
        }
        
        return redirect('puesto')->with($data);
        
        
         // PONER EN LA PRACTICA QUE HAGA, QUE CUNADO NO SE CAMBIE NADA, SE QUEDE EN LA PAGINA DEL EDIT Y MUESTRE UN MENSAJE
         
         
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(puesto $puesto, empleado $empleado)
    {
        //
        
        $data=[];
        $data['message']= 'The employment ' . $puesto->name . ' has been removed';
        $data['type']= 'success';
        $id=0;
        try{
            // Actualizar todas las IDS a 0
            empleado::where('idpuesto', $puesto->id)->update(['idpuesto'=>$id]);
            $puesto->delete();
           // $empleado->update(idpuesto->unsigned()); 
        }catch (Exception $e){
            $data['message']= 'The employment ' . $puesto->name . ' hasn´t been removed';
            $data['type']= 'danger';
        }
           
        
       return redirect('puesto')->with($data);
        
    }
    
    function flush(){ // 
         try { 
         // Borrar los datos de la tabla entera
        puesto::query()->delete();
        
        $data['message']= 'You have successfully deleted all employments!';
        $data['type']= 'success';
        return redirect('puesto')->with($data);
         } catch(\Exception $e) {
        
            $data['message']= 'Have a problem with delete all EMPLOYEESemployments!';
            $data['type']= 'danger';
            return back()->withInput()->with($data);
        }
         

     }
    
}
