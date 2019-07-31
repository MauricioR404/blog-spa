@extends('admin.layout')


@section('content-header')
{{-- <h1>
    Todas los Mensajes
    <small>Mensajes</small>
</h1> --}}
{{-- <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}" class="active" style="color: #777;">Messages</a></li>
</ol> --}}
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
      <h3>Mensaje de {{ $message->name }}</h3>
      <p>Correo: {{ $message->email }}</p>
    </div>
    <div class="box-body">
        Cotenido del mensaje: 
        <p>{{ $message->content }}</p>
    </div>
</div>
@endsection


