<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Departamentos;
use Illuminate\Http\Request;


class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
         $areas = Areas::where('estatus','!=',3)->get()->all();
         $areasAll = Areas::get()->all();

         $departamentos = Departamentos::where('estatus','!=',3)->get()->all();
        
         //$departamentos = Departamentos::get()->all();
      //  $areas=Areas::with('area')->all();
        //dd($areas);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Departamentos"], ['link' => "javascript:void(0)", 'name' => "Departamentos"], ['name' => "Departamentos"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
      //dd($colores);
      //dd($catA);
        return view('catalogos.departamentos', /*['pageConfigs' => $pageConfigs],*/ ['breadcrumbs' => $breadcrumbs])->with(compact('departamentos','areas','areasAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        switch ($request->estado) {
            case "on":
                $estatus=1;
                break;
           
            default:
                $estatus=2;
                break;
        }
        //dd($request->estatus);
        
        if ($request->action=="update"){
            
            $request->validate([
                'descripcion' => 'required',
                'area' => 'required',
            ]);
            $etapas=Departamentos::where('clave','=',$request->clave)->first();
            //dd($etapas);
            
            $etapas->update($request->all());
            $etapas->update(['estatus' => $estatus]);
    
            return redirect()->route('departamentos.index')
            ->with('success', 'Departamento actualizada exitosamente.');
        }
        $request->validate([
        
            'descripcion' => 'required',
            'area' => 'required',
            
        ]);

        $etapa=Departamentos::create($request->all());
        $etapa->update(['estatus' => $estatus]);

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento creada exitosamente.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $departamentos=Departamentos::where('clave','=',$id)->first();
        ///dd($etapas);
        //$ejemplo = Etapas::find($id)->update(['estatus' => 3]);
        $departamentos->update(['estatus' => 3]);
        return redirect()->route('departamentos.index')
        ->with('success', 'departamento borrada exitosamente.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
