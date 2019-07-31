<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();
        Permission::truncate();

        $adminRole = Role::create([
            'name' => 'Admin',
            'display_name' => 'Admistrador'
        ]);
        $writeRole = Role::create([
            'name' => 'writer',
            'display_name' => 'Escritor'
        ]);

        $viewPostsPermission = Permission::create([
            'name' => 'View posts',
            'display_name' => 'Ver post']);
        $CreatePostsPermission = Permission::create([
            'name' => 'Create posts',
            'display_name' => 'Crear post']);
        $UpdatePostsPermission = Permission::create([
            'name' => 'Update posts',
            'display_name' => 'Actualizar post']);
        $DeletePostsPermission = Permission::create([
            'name' => 'Delete posts',
            'display_name' => 'Eliminar post']);


        $viewUsersPermission = Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver usuarios']);
        $CreateUsersPermission = Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear usuarios']);
        $UpdateUsersPermission = Permission::create([
            'name' => 'Update users',
            'display_name' => 'Editar usuarios']);
        $DeleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar usuarios']);

        $viewRolesPermission = Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver roles']);
        $CreateRolesPermission = Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear roles']);
        $UpdateRolesPermission = Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Editar roles']);
        $DeleteRolesPermission = Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Eliminar roles']);
        
        $ViewMessage = Permission::create([
            'name' => 'View messages',
            'display_name' => 'Ver mensajes']);
        $DeleteMessages = Permission::create([
            'name' => 'Delete messages',
            'display_name' => 'Editar mensajes']);


        $viewPermissionsPermission = Permission::create([
            'name' => 'View permissions',
            'display_name' => 'Ver permisos'
        ]);

        $DeletePermissionsPermission = Permission::create([
            'name' => 'Update permissions',
            'display_name' => 'Actualizar permisos'
        ]);

        $admin = new User;
        $admin->name = "Mauricio Rivas";
        $admin->email = "rivasm411@gmail.com";
        $admin->password = '12345678';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "Juan Flores";
        $writer->email = "juanm411@gmail.com";
        $writer->password = '12345678';
        $writer->save();

        $writer->assignRole($writeRole);
    }
}
