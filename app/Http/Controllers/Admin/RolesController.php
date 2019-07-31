<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    
    public function index()
    {
        $this->authorize('view', new Role);

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        $this->authorize('create', $role =  new Role);

        return view('admin.roles.create', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Role);

        $data = $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required',
        ]);

        $role = Role::create($data);
        
        if($request->filled('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El rol se ha creado correctamente');
    }

    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $data = $request->validate(['display_name' => 'required'],
            [
                'display_name.required' => 'El campo nombre es obligatorio.'
            ]
        );
        
        $role->update($data);

        $role->permissions()->detach();
    
        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit', $role)->withFlash('El rol fue editado correctamente');

    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('El role fue eliminado');
    }
}
