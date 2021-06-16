{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Blank Page')

{{-- page content --}}
@section('content')
<div class="section">
    <div class="card"> 
        <div class="card-content">
            
            <div class="row">
            <div class="col 2">
                <h4 class="card-title">Estatus
                  
                </h4> 
            </div>
            <div class="col 2" >
                <a  id="btnplus" onclick="nuevo()" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            </div>
             
             <form action="{{ route('estatus.store') }}" style="display: block;" id="formAreas"method="POST" >
                @csrf
              
                <div class="row">
                  <div class="col s3">
                    Clave:
                    <div class="input-field inline">
                      <input disabled readonly name="clave" id="clave"   type="text">
                      <label for="clave"  >Clave</label>
                   
                    </div>
                  </div>
                  <div class="switch col s4">
                    Descripcion:
                    <div class="input-field inline">
                      <input disabled required name="descripcion" id="descripcion"  type="text">
                      <label for="descripcion">Descripcion</label>
                    </div>
                  </div>
                  <div class="switch col s5">
                    Estatus:
                    <div class="input-field col s12">
                    <label>
                      Inactivo
                      <input disabled id="estado" name="estado" type="checkbox">
                      <span class="lever"></span>
                      Activo
                    </label>
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col s4">
                      Departamento: 
                      <div class="input-field inline">
                      <select disabled name="departamento" id="departamento" >
                        <option value="0" disabled selected>Selecciona Departamento</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->clave}}">{{$departamento->descripcion}}</option>
                        @endforeach
                        <label for="descripcion">Area</label>
                      </select>
                      </div>
                    </div>
                      <div class="col s4">
                        Area: 
                        <div class="input-field inline">
                        <select disabled name="area" id="area" >
                          <option value="0" disabled selected>Selecciona Area</option>
                          @foreach ($areas as $area)
                          <option value="{{$area->clave}}">{{$area->descripcion}}</option>
                          @endforeach
                          <label for="descripcion">Area</label>
                        </select>
                        </div>
                      </div>
                     
                      <div class="col s2">
                          <div class="input-field col s12">
                             
                            <button style="display:block" class="btn cyan waves-effect waves-light" disabled id=guardar value="save" type="submit" name="action">Guardar</button>
                            <button style="display: none" class="btn cyan waves-effect waves-light" id=actualizar value="update" type="submit" name="action">Actualizar</button>                       
                            
                      </div>
                      </div>
                     
                  </div>
           </form>
        </div>
    </div>
    <div class="card"> 
        <div class="card-content">
           
          <table id="data-table-simple" class="display">
            <thead>
              <tr>
                <th>Clave</th>
                <th>Descripcion</th>
                <th>Area</th>
                <th>Departamento</th>
                <th>Acciones</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($estatus as $estat)
               
               <tr>
                <td id="clave-{{$estat->clave}}">{{$estat->clave}}</td>
                <td id="descripcion-{{$estat->clave}}">{{$estat->descripcion}}</td>
                <td id="area-{{$estat->clave}}">{{$estat->area}}</td>
                <td id="departamento-{{$estat->clave}}">{{$estat->departamento}}</td>
                <td>
                  <a onclick="actualizar({{$estat->clave}},'{{$estat->descripcion}}',{{$estat->estatus}},'{{$estat->area}}',{{$estat->departamento}})"><i class="material-icons">edit</i></a>
                  <a href="{{ route('estatus.edit',$estat->clave) }}"><i class="material-icons">delete</i></a>
                </td>
             
                
               </tr>
           @endforeach
              
            </tbody>
            <tfoot>
              <tr>
                <th>Clave</th>
                <th>Descripcion</th>
                <th>Area</th>
                <th>Departamento</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
              
                                    
        </div>
    </div>
</div>

@endsection
<script>

function nuevo(){
    var clave = document.getElementById("clave");
    var descripcion = document.getElementById("descripcion");
    var estado = document.getElementById("estado");
    var btn_actualizar = document.getElementById("actualizar");
    var btn_guardar = document.getElementById("guardar");
    selectArea = document.getElementById('area'); 
    selectDepartamento = document.getElementById('departamento'); 
    

    $('#descripcion').val("");
    $('#clave').val("");
    selectDepartamento.disabled=false;
    selectArea.disabled=false;
    estado.disabled=false;
    descripcion.disabled=false;
    clave.disabled=false;
    btn_actualizar.style.display = "none";
    btn_actualizar.disabled=true;
    btn_guardar.style.display = "block";
    btn_guardar.disabled=false;
    change_select(selectArea,0);
    change_select(selectDepartamento,0)
    //document.getElementById('miText').disabled = true;
}
function actualizar(id,desc,stat,area,departamento){

    var clave = document.getElementById("clave");
    var descripcion = document.getElementById("descripcion");
    var estado = document.getElementById("estado");
    var btn_actualizar = document.getElementById("actualizar");
    var btn_guardar = document.getElementById("guardar");
    selectArea = document.getElementById('area'); 
    selectDepartamento = document.getElementById('departamento'); 
    
    selectArea.disabled=false;
    selectDepartamento.disabled=false;
    estado.disabled=false;
    descripcion.disabled=false;
    clave.disabled=false;
    btn_actualizar.style.display = "block";
    btn_actualizar.disabled=false;
    btn_guardar.style.display = "none";
    btn_guardar.disabled=true;
    $('#clave').val(id);
    $('#descripcion').val(desc);
    
    if(stat==1){
        $("#estado").prop("checked", true);        
    }
    if(stat==2){
        $("#estado").prop("checked", false);        
    }
    updatefields();
    change_select(selectArea,area);
    change_select(selectDepartamento,departamento);
    //document.getElementById('miText').disabled = true;
}



function bloquearForm(){
    var btn_actualizar = document.getElementById("actualizar");
    var btn_guardar = document.getElementById("guardar");
    var clave = document.getElementById("clave");
    var descripcion = document.getElementById("descripcion");
    var estado = document.getElementById("estado");
    estado.disabled=true;
    descripcion.disabled=true;
    clave.disabled=true;
    btn_actualizar.style.display = "none";
    btn_guardar.style.display = "none";

}

</script>