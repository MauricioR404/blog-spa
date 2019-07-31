@extends('admin.layout')


@section('content-header')
<h1>
    Todas los Mensajes
    <small>Mensajes</small>
</h1>
{{-- <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}" class="active" style="color: #777;">Messages</a></li>
</ol> --}}
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        {{-- <h3 class="box-title">Listado de todo los Mensajes</h3> --}}

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td width="20px;" style="text-align: center;">
                            {{-- @can('view', $message) --}}
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-xs btn-info" target="_blank">
                                    <i class="fa fa-eye"></i>
                                </a>
                            {{-- @endcan --}}
                            @can('delete', $message)
                                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" class="display: inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('¿Estás seguro de querer eliminar esta publicacion?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endcan
                            
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" style="text-align:center;">
                            No hay mensajes
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
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