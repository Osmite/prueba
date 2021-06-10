{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Colores')

{{-- page content --}}
@section('content')
<div class="section">
      <div class="card">      
    <div class="card-content">
        <div class="col s12 m12 l12">
            <div id="form-with-validation" class="card card card-default scrollspy">
              <div class="card-content">
                <h4 class="card-title">Inline form with placeholder</h4>
                <form>
                  <div class="row">
                    <div class="input-field col m4 s6">
                      <i class="material-icons prefix">account_circle</i>
                      <input placeholder="John Doe" id="icon_prefix2" type="text" class="validate">
                      <label for="icon_prefix2">First Name</label>
                    </div>
                    <div class="input-field col m4 s6">
                      <i class="material-icons prefix">email</i>
                      <input placeholder="john@mydomain.com" id="icon_email" type="email" class="validate">
                      <label for="icon_email">Email</label>
                    </div>
                    <div class="input-field col m4 s12">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light" type="submit" name="action">
                          <i class="material-icons left">perm_identity</i> Signup</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        
      <p class="caption mb-0">
    
    
        </p>
      <table id="data-table-simple" class="display">
        <thead>
          <tr>
            <th>Nombre Español</th>
            <th>Nombre Ingles</th>
            <th>Codigo</th>
            <th>color</th>
            <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colores as $color)
           
           <tr>
            <td>{{$color->nombreEsp}}</td>
            <td>{{$color->nombreEng}}</td>
            <td>{{$color->codigo}}</td>
            <td style="background-color: {{$color->codigo}}"></td>
            
            <td>{{$color->tipo}}</td>
            
           </tr>
       @endforeach
          
        </tbody>
        <tfoot>
          <tr>
            <th>Nombre Español</th>
            <th>Nombre Ingles</th>
            <th>Codigo</th>
            <th>Color</th>
            <th>Tipo</th>
          </tr>
        </tfoot>
      </table>
    </div>
    
  </div>
  
</div>
@endsection