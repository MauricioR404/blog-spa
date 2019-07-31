@extends('admin.layout')


@section('content-header')
<h1>
    Permisos
    <small>permissions</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{-- route('admin') --}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{-- route('admin.posts.index') --}}" class="active" style="color: #777;">Post</a></li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de todo los Permisos</h3>
        {{-- <a href="{{ route('admin.permissions.create') }}" type="submit" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i> Crear permiso
        </a> --}}
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Identificador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td width="20px;" style="text-align: center;">
                            {{-- <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-xs btn-info">
                                <i class="fa fa-eye"></i>
                            </a> --}}
                            @can('update', $permission)
                                <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            @endcan
                            {{-- @if ($permission->id !==1)
                                
                                <form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}" class="display: inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('¿Estás seguro de querer eliminar el rol?')">
                                    <i class="fa fa-times"></i>
                                </button>
                                </form>

                            @endif --}}
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Identificador</th>
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