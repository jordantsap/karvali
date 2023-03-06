<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permission = Permission::all();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->name = 'Super-Admin';
        $dev_role->save();
        $dev_role->permissions()->attach($admin_permission);

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(['view_events','view_products','view_groups','view_companies','view_users','create_users','update_users','create_posts','update_posts','view_posts']);

        $role = Role::create(['name' => 'Blogger']);
        $role->givePermissionTo(['view_posts','create_posts', 'update_posts']);

        /*----------------------------*/
        $role = Role::create(['name' => 'Company Owner']);
        $role->givePermissionTo(['company_management']);

        $role = Role::create(['name' => 'Group Manager']);
        $role->givePermissionTo(['group_management']);

        $role = Role::create(['name' => 'Product Supplier']);
        $role->givePermissionTo(['product_management']);

        $role = Role::create(['name' => 'Event Host']);
        $role->givePermissionTo(['event_management']);

        $role = Role::create(['name' => 'Customer']);
        $role->givePermissionTo(['order_management']);
    }
}
