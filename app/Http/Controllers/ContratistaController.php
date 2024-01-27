<?php

namespace App\Http\Controllers;

use App\Models\contratista;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage; 

class ContratistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *@return \Illuminate\Http\response
     */
    public function index()
    {
        //
        $datos['contratistas']=contratista::paginate(50); 
        return view('contratista.index',$datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     *@param  \Illuminate\Http\Request $request
     *@return \Illuminate\Http\response
     */
    public function create()
    {
       
        
        //
        return view('contratista.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     *@return \Illuminate\Http\response
     */
    
    public function store(Request $request)
    {
        
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        
        ];
        $mensaje=[
                'required'=>'El :attribute es requerido',
                'foto.require'=>'la foto requerida'
                
        ];

        $this->validate($request, $campos,$mensaje);

        
        //$datosContratista = request()->all();
        $datosContratista = request()->except('_token');

        if($request->hasFile('foto')){
            $datosContratista['foto']=$request->file ('foto')->store('uploads','public');

        }


        Contratista::insert($datosContratista);


       // return response()->json($datosContratista);
       return redirect('contratista')->with('mensaje','Contratista agregado con exito');


    }

    /**
     * Display the specified resource.
     */
    public function show(contratista $contratista)
    {
        //
    }
     /**
     * Show the form for editing the specified resource. 
     * 
     * @param  \Illuminate\Http\Contratista $request
     *@return \Illuminate\Http\response
     */
     public function edit($id) 
    {
        //
        $contratista=Contratista::findOrFail($id);
        return view('contratista.edit', compact('contratista') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
          //

          $campos=[
            'Nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'correo'=>'required|email',
        
        
        ];
        $mensaje=[
                'required'=>'El :attribute es requerido',
        
                
        ];

        if($request->hasFile('foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['foto.required'=>'la foto requerida' ];

        }

            $this->validate($request, $campos,$mensaje);

        //
        $datosContratista = request()->except(['_token','_method']);
       
        if($request->hasFile('foto')){
            $contratista=Contratista::findOrFail($id);

            Storage::delete('public/'.$contratista->foto);

            $datosContratista['foto']=$request->file ('foto')->store('uploads','public');
        }



       Contratista::where('id','=',$id)->update($datosContratista);
       $contratista=Contratista::findOrFail($id);
       //return view('contratista.edit', compact('contratista') );

        return redirect('contratista')->with('mensaje','Contratista Modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $contratista=Contratista::findOrFail($id);

        if(Storage::delete('public/'.$contratista->foto)){
             contratista::destroy($id);
        }

     

        return redirect('contratista')->with('mensaje','Contratista Borrado');
    }
}
