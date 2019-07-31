@extends('admin.layout')

@section('content-header')
<h1>
    Crear publicación
    <small></small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}">Post</a></li>
    <li><a href="{{ route('admin.posts.create') }}" class="active" style="color: #777;">Crear</a></li>
</ol>
@endsection


@section('content')

<div class="row">

    @if($post->photos->count())
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($post->photos as $photo)
                            <div class="col-xs-2">
                                <form action="{{ route('admin.photos.destroy', $photo) }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-xs" style="position: absolute;" type="submit">
                                        <i class="fa fa-remove"></i></button>
                                </form>
                                <img src="{{ asset('img') }}/{{ $photo->url }}" class="img-responsive">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <form role="form" method="POST" action="{{ route('admin.posts.update', $post) }}">
        @csrf
        {{ method_field('put') }}
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear publicacion</h3>
                </div>

                <div class="box-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Titulo</label>
                        <input name="title" value="{{ old('title', $post->title) }}" type="text" class="form-control" id="exampleInputEmail1" >
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('body', $post->body) ? 'has-error' : '' }}">
                        <label for="exampleInputPassword1">Contenido de la publicacion</label>
                        <textarea name="body" class="form-control"  id="editor" cols="30" rows="10">{{ old('body', $post->body) }}</textarea>
                        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="box box-primary">

                <div class="box-body">
                    <div class="form-group">
                        <label>Fecha de publicación:</label>
        
                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input name="published_at" value="{{ old('published_at', $post->published_at ?  $post->published_at->format('m/d/Y') : null ) }}" type="text" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                        <label>Categorias</label>
                        <select name="category_id" id="" class="form-control select2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label>Etiquetas</label>
                        <select 
                            name="tags[]" 
                            class="form-control select2" 
                            multiple="multiple" 
                            data-placeholder="Seleciona o más etiquetas"
                            style="width: 100%;">

                            @foreach ($tags as $tag)
                                <option 
                                    value="{{ $tag->id }}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                        <label for="exampleInputPassword1">Extracto de la publicacion</label>
                        <textarea class="form-control" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
                        {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="dropzone">

                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>

    

</div>

@endsection


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
<link rel="stylesheet" href="{{ asset('adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminLTE/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('adminLTE/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminLTE/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $('#datepicker').datepicker({
        autoclose: true
    })

    $('.select2').select2({
        tags: true
    });

    CKEDITOR.replace('editor');
    CKEDITOR.config.height = 285;


    var myDropzone = new Dropzone('.dropzone', {
        url: '/admin/posts/{{ $post->url }}/photos',
        paramName: 'photo',
        headers: {
            'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        dictDefaultMessage: 'Solo puedes subir una foto por publicacion'
    });

    Dropzone.autoDiscover = false
    
    myDropzone.on('error', function(file, res){
        var msg = res.errors.photo[0];
        $('.dz-error-message:last > span').text(msg);
        $('.dropzone').css({
            'border' : '1px solid #dd4b39'
        });
    });

    
</script>

@endpush



