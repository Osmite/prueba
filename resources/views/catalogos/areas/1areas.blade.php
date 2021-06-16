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
                <h4 class="card-title">Nueva Area</h4>
                <form action="{{ route('areas.store') }}" method="POST" >
                  @csrf
                  <div class="row">
                  
                   
                    
                      <div class="input-field col m6 s12">
                        <input readonly name="clave" id="clave"  type="text">
                        <label for="orden">Clave</label>
                      </div>
                      <div class="input-field col m6 s12">
                        <input  name="descripcion" id="descripcion"  type="text">
                        <label for="descripcion">Descripcion</label>
                      </div>
                    
                    <div class="input-field col m4 s12">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light" id=guardar type="submit" name="action">Guardar</button>
                       
                        
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
              <a onclick="actualizar({{$area->clave}},'{{$area->descripcion}}')"><i class="material-icons">edit</i></a>
              <a href="{{ route('areas.destroy',$area->clave) }}"><i class="material-icons">delete</i></a>
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
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});



  function myFunction() {
    
    var x = document.getElementById("form-nuevo");
    
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

}



function actualizar(clave, descripcion) {
  
  $('#clave').val(clave);
  $('#descripcion').val(descripcion);
 
  
      
}
</script>


