@extends('admin.layout')


@section('content')
    <h1>Contenido</h1>
    <p>Bienvenido: {{ auth()->user()->name }}</p>
@endsection