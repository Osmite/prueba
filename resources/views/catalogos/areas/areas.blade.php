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
                <h4 class="card-title">Areas
                  
                </h4> 
            </div>
            <div class="col 2">
                <a  id="btnplus" onclick="nuevo()" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            </div>
             
             <form action="{{ route('areas.store') }}" style="display: block;" id="formAreas"method="POST" >
                @csrf
              
                
                  <div class="row">
                      <div class="col 2">
                        Clave:
                        <div class="input-field inline">
                          <input disabled readonly name="clave" id="clave"   type="text">
                          <label for="orden"  >Clave</label>
                       
                        </div>
                      </div>
                      <div  class="col 2" >
                          Descripcion:
                          <div class="input-field inline">
                            <input disabled required name="descripcion" id="descripcion"  type="text">
                            <label for="descripcion">Descripcion</label>
                          </div>
                      </div>
                      <div class="switch col s3">
                          <div class="input-field col s12">
                          <label>
                            Inactivo
                            <input disabled id="estado" name="estado" type="checkbox">
                            <span class="lever"></span>
                            Activo
                          </label>
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
                    
                    <th>Acciones</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                   
                   <tr>
                    <td>{{$area->clave}}</td>
                    <td>{{$area->descripcion}}</td>
                   
                    <td>
                      <a onclick="actualizar({{$area->clave}},'{{$area->descripcion}}','{{$area->estatus}}')"><i class="material-icons">edit</i></a>
                      <a href="{{ route('areas.edit',$area->clave) }}"><i class="material-icons">delete</i></a>
                    </td>
                 
                    
                   </tr>
               @endforeach
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Clave</th>
                    <th>Descripcion</th>
                   
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

    $('#descripcion').val("");
    $('#clave').val("");
    estado.disabled=false;
    descripcion.disabled=false;
    clave.disabled=false;
    btn_actualizar.style.display = "none";
    btn_actualizar.disabled=true;
    btn_guardar.style.display = "block";
    btn_guardar.disabled=false;
    //document.getElementById('miText').disabled = true;
}
function actualizar(id,desc,stat){
    var clave = document.getElementById("clave");
    var descripcion = document.getElementById("descripcion");
    var estado = document.getElementById("estado");
    var btn_actualizar = document.getElementById("actualizar");
    var btn_guardar = document.getElementById("guardar");

    estado.disabled=false;
    descripcion.disabled=false;
    clave.disabled=false;
    btn_actualizar.style.display = "block";
    btn_actualizar.disabled=false;
    btn_guardar.style.display = "none";
    btn_guardar.disabled=true;
    $('#clave').val(id);
    $('#descripcion').val(desc);
    updatefields();
    if(stat==1){
        $("#estado").prop("checked", true);
    }
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