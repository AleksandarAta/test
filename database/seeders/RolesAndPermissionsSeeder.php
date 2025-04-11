<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'edit_blogs']);

        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo('edit_users', 'edit_blogs');
        $editor_role = Role::create(['name' => 'editor']);
        $editor_role->givePermissionTo('edit_blogs');
    }
}
