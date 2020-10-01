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

        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);

        $viewPostPermission = Permission::create(['name'=>'View posts', 'display_name' => 'Ver posts']);
        $createPostPermission = Permission::create(['name'=>'Create posts', 'display_name' => 'Crear posts']);
        $updatePostPermission = Permission::create(['name'=>'Update posts', 'display_name' => 'Actualizar posts']);
        $deletePostPermission = Permission::create(['name'=>'Delete posts', 'display_name' => 'Eliminar posts']);

        $viewUserPermission = Permission::create(['name'=>'View users', 'display_name' => 'Ver usuarios']);
        $createUserPermission = Permission::create(['name'=>'Create users', 'display_name' => 'Crear usuarios']);
        $updateUserPermission = Permission::create(['name'=>'Update users', 'display_name' => 'Actualizar usuarios']);
        $deleteUserPermission = Permission::create(['name'=>'Delete users', 'display_name' => 'Eliminar usuarios']);

        $viewRolePermission = Permission::create(['name'=>'View roles', 'display_name' => 'Ver roles']);
        $createRolePermission = Permission::create(['name'=>'Create roles', 'display_name' => 'Crear roles']);
        $updateRolePermission = Permission::create(['name'=>'Update roles', 'display_name' => 'Actualizar roles']);
        $deleteRolePermission = Permission::create(['name'=>'Delete roles', 'display_name' => 'Eliminar roles']);

        //$updateRolesPermission = Permission::create(['name'=>'Update roles']);

        //$adminRole->givePermissionTo($permission);
        $writerRole->givePermissionTo($createPostPermission);
        $writerRole->givePermissionTo($updatePostPermission);
        $writerRole->givePermissionTo($deletePostPermission);

        /*
        $adminRole->givePermissionTo($viewUserPermission);
        $adminRole->givePermissionTo($createUserPermission);
        $adminRole->givePermissionTo($updateUserPermission);
        $adminRole->givePermissionTo($deleteUserPermission);

        $adminRole->givePermissionTo($viewPostPermission);
        $adminRole->givePermissionTo($createPostPermission);
        $adminRole->givePermissionTo($updatePostPermission);
        $adminRole->givePermissionTo($deletePostPermission);*/

        $admin = new User;
        $admin->name = 'Juan Manuel';
        $admin->email = 'com.jmenesesi@gmail.com';
        $admin->password = 'password';
        $admin->save();

        $admin->assignRole($adminRole);

        $user = new User;
        $user->name = 'Juan ';
        $user->email = 'juanma.meneses25@gmail.com';
        $user->password = 'password';
        $user->save();

        $user->assignRole($writerRole);
    }
}
