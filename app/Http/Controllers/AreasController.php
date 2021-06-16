<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $areas = Areas::where('estatus','!=',3)->get()->all();
        
        $breadcrumbs = [
            ['link' => "/", 'name' => "Areas"], ['link' => "javascript:void(0)", 'name' => "Areas"], ['name' => "Areas"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
      //dd($colores);
        return view('catalogos.areas', /*['pageConfigs' => $pageConfigs],*/ ['breadcrumbs' => $breadcrumbs])->with(compact('areas'));
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
            ]);
            $etapas=Areas::where('clave','=',$request->clave)->first();
            //dd($etapas);
            
            $etapas->update($request->all());
            $etapas->update(['estatus' => $estatus]);
    
            return redirect()->route('areas.index')
            ->with('success', 'Area actualizada exitosamente.');
        }
        $request->validate([
        
            'descripcion' => 'required',
            
        ]);

        $etapa=Areas::create($request->all());
        $etapa->update(['estatus' => $estatus]);

        return redirect()->route('areas.index')
            ->with('success', 'Area creada exitosamente.');
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
        $areas=Areas::where('clave','=',$id)->first();
        ///dd($etapas);
        //$ejemplo = Etapas::find($id)->update(['estatus' => 3]);
        $areas->update(['estatus' => 3]);
        return redirect()->route('areas.index')
        ->with('success', 'area borrada exitosamente.');

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
