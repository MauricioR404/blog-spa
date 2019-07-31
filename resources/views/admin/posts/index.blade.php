@extends('admin.layout')


@section('content-header')
<h1>
    Todas las publicaciones
    <small>Post</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}" class="active" style="color: #777;">Post</a></li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de todo los post</h3>
        @can('create', $posts->first())
            <button 
                type="submit" 
                class="btn btn-primary pull-right" 
                data-toggle="modal" 
                data-target="#exampleModal"><i class="fa fa-plus"></i> Crear publicacion
            </button>
        @endcan
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Extracto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td width="20px;" style="text-align: center;">
                            {{-- @can('view', $post)
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-info" target="_blank">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endcan --}}

                            @can('update', $post)
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            @endcan
                            @can('delete', $post)
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="display: inline">
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
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Extracto</th>
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