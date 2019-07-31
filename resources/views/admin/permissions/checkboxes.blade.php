@forelse ($permissions as $id => $name)
    <div class="chepckbox">
        <label >
            <input name="permissions[]" type="checkbox" value="{{ $name }}"
                {{ $model->permissions->contains($id) || 
                collect(old('permissions'))->contains($name)  ? 'checked' : '' }}>
                {{ $name }}
        </label>
    </div>
@empty
    No hay roles
@endforelse