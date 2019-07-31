<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::allowed()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', new User);
        $user = new User;
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', new User);
        //Generar un contraseña
        $data['password'] = str_random(8);
        //Creamos el usuario
        $user = User::create($data);
        //Asignamos los roles
        if($request->filled('roles'))
        {
            $user->assignRole($request->roles);
        }
        //Asignamos los permisos
        if($request->filled('permissions'))
        {
            $user->givePermissionTo($request->permissions);
        }
        //Enviamos el email
        UserWasCreated::dispatch($user, $data['password']);
        //Regresamos al usuario
        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');

    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->validated());

        return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.users.index')->withFlash('Usuario eliminado');
    }
}
