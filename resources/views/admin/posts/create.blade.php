<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form role="form" method="POST" action="{{ route('admin.posts.store', '#create') }}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear una nueva publicacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Crear post</label>
                        <input name="title" id="post-title" value="{{ old('title') }}" type="text" class="form-control"
                            id="exampleInputEmail1" required autofocus>
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </form>
</div>


@unless (request()->is('admin/posts/*'))
    <script>
        if(window.location.hash === '#create')
        {
            $('#exampleModal').modal('show')
        }
    
        $('#exampleModal').on('hide.bs.modal', function(){
            window.location.hash = '#';
        });
    
        $('#exampleModal').on('shown.bs.modal', function(){
            $('post-title').focus();
            window.location.hash = '#create';
        });
        
    </script>  
@endunless
