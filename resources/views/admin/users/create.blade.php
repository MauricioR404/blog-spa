@extends('admin.layout')



@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header width-border">
                <h3 class="box-title">Datos personales</h3>
            </div>

            <div class="box-body">
                @include('admin.partials.error-messages')

                <form method="POST" action="{{ route('admin.users.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label>Roles</label>
                        @include('admin.roles.checkboxes')
                    </div>
                    <div class="form-group col-md-6">
                        <label>Permisos</label>
                            @include('admin.permissions.checkboxes', ['model' => $user])
                    </div>
                    <small class="text-muted">La contraseña sera generar y enviada al correo</small>
                    <button class="btn btn-primary btn-block" type="submit">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection