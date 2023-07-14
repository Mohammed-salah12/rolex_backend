<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Create permissions for the admin guard
        $adminPermissions = [
            'create-admin', 'index-admin', 'edit-admin', 'delete-admin',
            'create-product', 'index-product', 'edit-product', 'delete-product',
            'create-opinion', 'index-opinion', 'edit-opinion', 'delete-opinion',
            'create-homepage', 'index-homepage', 'edit-homepage', 'delete-homepage',
            'create-role', 'index-role', 'edit-role', 'delete-role',
            'create-permission', 'index-permission', 'edit-permission', 'delete-permission',
            'create-author', 'index-author', 'edit-author', 'delete-author',

        ];

        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        }

// Create permissions for the author guard
        $authorPermissions = [
            'create-author', 'index-author', 'edit-author', 'delete-author',
            'create-product', 'index-product', 'edit-product', 'delete-product',
            'create-opinion', 'index-opinion', 'edit-opinion', 'delete-opinion',
            'create-homepage', 'index-homepage', 'edit-homepage', 'delete-homepage',
            'create-role', 'index-role', 'edit-role', 'delete-role',
            'create-permission', 'index-permission', 'edit-permission', 'delete-permission',
            'create-admin', 'index-admin', 'edit-admin', 'delete-admin',

        ];

        foreach ($authorPermissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        }

// Create the super-admin role if it doesn't exist
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'admin']);

// Sync all admin permissions to the super-admin role
        $superAdminRole->syncPermissions($adminPermissions);

// Seed the admin user
        $admin = Admin::create([
            'gmail' => 'adminSuper@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

// Assign the super-admin role to the admin user
        $admin->assignRole($superAdminRole);

    }
}
