@extends('admin.layout')



@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header width-border">
                <h3 class="box-title">Crear Roles</h3>
            </div>

            <div class="box-body">
                @include('admin.partials.error-messages')

                <form method="POST" action="{{ route('admin.roles.store') }}">
                    {{ csrf_field() }} 

                    @include('admin.roles.form')

                    {{-- <small class="text-muted">La contraseña sera generar y enviada al correo</small> --}}
                    <button class="btn btn-primary btn-block" type="submit">Crear role</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection