
<div class="form-group">
     <label for="name">Indentificador:</label>

     @if ($role->exists)
          <input type="text" name="name" value="{{  $role->name }}" class="form-control" disabled>
     @else     
          <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control">
     @endif
</div>

<div class="form-group">
     <label for="display_name">Nombre:</label>
     <input type="text" name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control">
</div>


<div class="form-group col-md-6">
     <label>Permisos</label>
          @include('admin.permissions.checkboxes', ['model' => $role])
</div>