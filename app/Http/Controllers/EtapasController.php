<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Departamentos;
use App\Models\Etapas;
use Illuminate\Http\Request;


class EtapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Areas::get()->all();
        $departamentos= Departamentos::get()->all();
        $etapas = Etapas::paginate(5);        
        $breadcrumbs = [
            ['link' => "/", 'name' => "Etapas"], ['link' => "javascript:void(0)", 'name' => "Etapas"], ['name' => "Etapas"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
      //dd($colores);
        return view('etapas.etapas', /*['pageConfigs' => $pageConfigs],*/ ['breadcrumbs' => $breadcrumbs])->with(compact('etapas','areas','departamentos'));
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
        if ($request->action=="update"){
            $request->validate([
                'area' => 'required',
                'departamento' => 'required',
                'descripcion' => 'required',
                
            ]);
            $etapas=Etapas::where('orden','=',$request->orden)->first();
            //dd($etapas);
            
            $etapas->update($request->all());
    
            return redirect()->route('etapas.index')
            ->with('success', 'Etapa actualizada exitosamente.');
        }
        $request->validate([
            'area' => 'required',
            'departamento' => 'required',
            'descripcion' => 'required',
            
        ]);

        Etapas::create($request->all());

        return redirect()->route('etapas.index')
            ->with('success', 'Etapa creada exitosamente.');
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
        dd($id);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
