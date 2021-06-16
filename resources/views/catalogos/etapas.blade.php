{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Etapas')

{{-- page content --}}
@section('content')

<div class="section">
      <div class="card">      
        <a  onclick="myFunction()" id="nuevo" class="btn btn-continuar btn-lg btn-block">+</a> 
            
        <div class="card-content">
          <div class="col s12 m12 l12">
            
            <div style="display: block;" id="form-nuevo" class="card card card-default scrollspy">
              <div class="card-content">
                <h4 class="card-title">Nueva Etapa</h4>
                
                <form action="{{ route('etapas.store') }}" method="POST" >
                  @csrf
                  <div class="row">
                    <p>
                      <label>
                        <input id="estado" name="estado" type="checkbox" checked="checked" />
                        <span>Activo</span>
                      </label>
                    </p>
                    <div class="input-field col m6 s12">
                      
                      <select id="area" name="area"  >
                        <option value="0" disabled selected >Selecciona Area</option>
                        @foreach ($areas as $area)
                        <option value="{{$area->clave}}">{{$area->descripcion}}</option>
                        @endforeach
                      </select>
                      <label>Area</label>
                    </div>
                    <div class="input-field col m6 s12">
                      <select name="departamento" id="departamento" >
                        <option value="0" disabled selected>Selecciona Departamento</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->clave}}">{{$departamento->descripcion}}</option>
                        @endforeach
                      </select>
                      <label>Departamento</label>
                    </div>

                    
                      <div class="input-field col m6 s12">
                        <input readonly name="orden" id="orden"  type="text">
                        <label for="orden">Orden</label>
                      </div>
                      <div class="input-field col m6 s12">
                        <input  name="descripcion" id="descripcion"  type="text">
                        <label for="descripcion">Descripcion</label>
                      </div>
                    
                    <div class="input-field col m4 s12">
                      <div class="input-field col s12">
                        <button style="display:none" class="btn cyan waves-effect waves-light" id=guardar value="save" type="submit" name="action">Guardar</button>
                        <button style="display: none" class="btn cyan waves-effect waves-light" id=actualizar value="update" type="submit" name="action">Actualizar</button>                       
                        
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            
          </div>
        
    
      <table id="data-table-simple" class="display">
        <thead>
          <tr>
            <th>Orden</th>
            <th>Descripcion</th>
            <th>Area</th>
            <th>Departamento</th>
            <th>Acciones</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($etapas as $etapa)
           
           <tr>
            <td id="orden-{{$etapa->orden}}">{{$etapa->orden}}</td>
            <td id="descripcion-{{$etapa->orden}}">{{$etapa->descripcion}}</td>
            <td id="area-{{$etapa->orden}}">{{$etapa->area}}</td>
            <td id="departamento-{{$etapa->orden}}">{{$etapa->departamento}}</td>
            <td>
              <a onclick="actualizar({{$etapa->orden}},'{{$etapa->descripcion}}','{{$etapa->area}}',{{$etapa->departamento}})"><i class="material-icons">edit</i></a>
              <a href="{{ route('etapas.edit',$etapa->orden) }}"><i class="material-icons">delete</i></a>
            </td>
         
            
           </tr>
       @endforeach
          
        </tbody>
        <tfoot>
          <tr>
            <th>Orden</th>
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
  

  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});



  function myFunction() {
    
    var x = document.getElementById("form-nuevo");
    var btn_actualizar = document.getElementById("actualizar");
    var btn_guardar = document.getElementById("guardar");
    
    if (x.style.display === "none") {
        x.style.display = "block";
        btn_guardar.style.display = "block";
        btn_actualizar.style.display = "none";
        

    } else {
        x.style.display = "none";
        btn_guardar.style.display = "none";
        btn_actualizar.style.display = "none";
    }

}



function actualizar(orden, descripcion,area,departamento) {
  
  $('#orden').val(orden);
  $('#descripcion').val(descripcion);
  selectArea = document.getElementById('area'); 
  selectDepto = document.getElementById('departamento'); 
  change_select(selectArea,area);
  change_select(selectDepto,departamento);
  updatefields();
  var btn_actualizar = document.getElementById("actualizar");
  var btn_guardar = document.getElementById("guardar");
  btn_actualizar.style.display = "block";
  btn_guardar.style.display = "none";
  var x = document.getElementById("form-nuevo");
  if (x.style.display === "none") {
    x.style.display = "block";
  }
}
</script>



