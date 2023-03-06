<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the default permissions
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        // $admin = Role::where('name','Admin')->first();
        //
        // $createTasks = new Permission();
        // $createTasks->slug = 'create-tasks';
        // $createTasks->name = 'Create Tasks';
        // $createTasks->save();
        // $createTasks->roles()->attach($admin);
    }
}
