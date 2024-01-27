<h1> {{ $modo }} contratista </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
<ul>
        @foreach( $errors->all() as $error)
        <li> {{ $error }}  </li>
    @endforeach
</ul>
   </div>



@endif

<div class="form-group">
<label for="nombre">  Nombre </label>
<input type="text" class="form-control" name="Nombre" 
value="{{ isset($contratista->nombre)?$contratista->nombre:old('Nombre') }}"id="Nombre" >
 </div>

 <div class="form-group">

<label for="apellido">  apellido </label>
<input type="text" class="form-control" name="apellido" 
value ="{{isset($contratista->apellido)?$contratista->apellido:old('apellido') }}"id="apellido" >
</div>

<div class="form-group">
    
<label for="correo">  correo </label>
<input type="text" class="form-control" name="correo" 
value ="{{isset($contratista->correo)?$contratista->correo:old('correo') }}"id="correo" >
</div>
<div class="form-group">

<label for="foto"> foto </label>
@if(isset($empleado->foto))
<img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$contratista->foto }}" width="100"alt="">
@endif
<input type="file" class="form-control" name="foto" value ="" id="foto">

</div>

<input class="btn btn-success" type= "submit"  value= "{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('contratista/')}}">Regresar </a>