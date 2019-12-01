<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

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
