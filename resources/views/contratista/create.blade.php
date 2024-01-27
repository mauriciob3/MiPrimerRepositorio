@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/contratista') }}" method="post" enctype="multipart/form-data" >
@csrf 
@include ('contratista.form',['modo'=>'Crear'] );


</form>
</div>
@endsection