<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'gmail' => 'adminSuper@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
