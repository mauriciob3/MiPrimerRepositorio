@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/contratista/'.$contratista->id) }}" method="post"enctype="multipart/form-data" >
@csrf
{{ method_field('PATCH') }}

@include ('contratista.form',['modo'=>'Editar']);

</form>
</div>
@endsection

