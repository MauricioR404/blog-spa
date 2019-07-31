@extends('admin.layout')


@section('content-header')
<h1>
    Usuarios
    <small>Users</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{-- route('admin') --}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{-- route('admin.posts.index') --}}" class="active" style="color: #777;">Post</a></li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de todo los usuarios</h3>
        @can('create', $users->first())
        <a href="{{ route('admin.users.create') }}" type="submit" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i> Crear usuario
        </a>
        @endcan
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td width="20px;" style="text-align: center;">
                            @can('view', $user)
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            @endcan

                            @can('update', $user)
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            @endcan

                            @can('delete', $user)
                                @if ($user->id !==1)
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="display: inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('¿Estás seguro de querer eliminar al usuario?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                                @endif
                            @endcan
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')

<script src="{{ asset('adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function () {
        $('#post-table').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
</script>
@endpush