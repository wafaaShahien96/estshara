<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Karim Osama',
            'email' => 'admin@admin.com',
            'password' => bcrypt('11445522'),
            'active' => 1,
        ]);

        $role = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'admin'
        ]);

        $permissions = Permission::pluck('id');
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);


    }
}
