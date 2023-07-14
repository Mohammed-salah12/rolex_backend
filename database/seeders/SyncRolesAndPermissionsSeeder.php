<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SyncRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminRole = Role::where('name', 'super-admin')->firstOrFail();

        // Define the permissions to be synced
        $permissionNames = [
            'create-admin', 'index-admin', 'edit-admin', 'delete-admin',
            'create-author', 'index-author', 'edit-author', 'delete-author',
            'create-product', 'index-product', 'edit-product', 'delete-product',
            'create-opinion', 'index-opinion', 'edit-opinion', 'delete-opinion',
            'create-homepage', 'index-homepage', 'edit-homepage', 'delete-homepage',
            'create-role', 'index-role', 'edit-role', 'delete-role',
            'create-permission', 'index-permission', 'edit-permission', 'delete-permission'
        ];

        // Get the permissions by their names
        $permissions = Permission::whereIn('name', $permissionNames)->get();

        // Sync the permissions to the super-admin role
        $superAdminRole->syncPermissions($permissions);
    }
}
