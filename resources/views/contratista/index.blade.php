@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}


</div>
@endif  




<a href="{{ url('contratista/create')}}"class="btn btn-success" >Registrar nuevo contratista </a>
<br/>
<br/>
<table class="table table-light">
    
<thead class="thead-light">
    <tr>
        <th>#</th>
        <th>foto</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>correo</th>
        <th>Acciones</th>
    </tr>
</thead>

<tbody>

    @foreach( $contratistas as $contratista )
    <tr>
        <td>{{ $contratista->id }}</td>

        <td>
        <img class="img-thumbnail img-fluid"src="{{ asset('storage').'/'.$contratista->foto }}" alt="">    
        </td>

        <td>{{ $contratista->nombre }}</td>
        <td>{{ $contratista->apellido }}</td>
        <td>{{ $contratista->correo }}</td>
        <td>
        
        <a href="{{ url('/contratista/'.$contratista->id.'/edit') }}" class="btn btn-warning">
                Editar
        </a>
      
            
            <form action= "{{ url('/contratista/'.$contratista->id ) }}"class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
            <input class="btn btn-danger" type= "submit"onclick="return confirm('¿Quieres borrar?')" 
                value="Borrar">
                
            </form>
             </td>
    </tr>
    @endforeach

</tbody>

</table>
</div>
@endsection