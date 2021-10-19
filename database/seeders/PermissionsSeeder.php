<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role_superAdmin = Role::create(['name' => 'super-admin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_storekeeper = Role::create(['name' => 'storekeeper']);
        $role_writer = Role::create(['name' => 'writer']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'approve comments']);
        Permission::create(['name' => 'no approve comments']);
        Permission::create(['name' => 'delete comments']);

        Permission::create(['name' => 'edit orders']);

        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'publish products']);
        Permission::create(['name' => 'unpublish products']);

        $role_admin->givePermissionTo('create users');
        $role_admin->givePermissionTo('edit users');
        $role_admin->givePermissionTo('delete users');
        $role_admin->givePermissionTo('approve comments');
        $role_admin->givePermissionTo('no approve comments');
        $role_admin->givePermissionTo('delete comments');
        $role_admin->givePermissionTo('create products');
        $role_admin->givePermissionTo('edit products');
        $role_admin->givePermissionTo('publish products');
        $role_admin->givePermissionTo('unpublish products');

        $role_storekeeper->givePermissionTo('approve comments');
        $role_storekeeper->givePermissionTo('no approve comments');
        $role_storekeeper->givePermissionTo('delete comments');
        $role_storekeeper->givePermissionTo('edit orders');

        $role_writer->givePermissionTo('create products');
        $role_writer->givePermissionTo('edit products');
        $role_writer->givePermissionTo('unpublish products');

        /**
         * @var $user User
         */
        $super_admin = User::create(['first_name' => 'سوپرادمین', 'email' => 'superadmin@example.com','password' => Hash::make('123456')]);
        $admin = User::create(['first_name' => 'علی', 'last_name' => 'شهرابی', 'email' => 'ali@example.com','password' => Hash::make('123456')]);
        $storekeeper = User::create(['first_name' => 'محمد', 'last_name' => 'شهرابی', 'email' => 'mohammad@example.com','password' => Hash::make('123456')]);
        $writer = User::create(['first_name' => 'احسان', 'last_name' => 'شهرابی', 'email' => 'ehsan@example.com','password' => Hash::make('123456')]);

        $super_admin->assignRole($role_superAdmin);
        $admin->assignRole($role_admin);
        $storekeeper->assignRole($role_storekeeper);
        $writer->assignRole($role_writer);
    }
}
