<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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
        $role->givePermissionTo([
            'view_events',
            'view_products',
//            'view_groups',
            'view_companies',
            'view_users',
            'create_users',
            'update_users',
            'create_posts',
            'update_posts',
            'view_posts']);

        /*----------------------------*/
        $role = Role::create(['name' => 'Company Products Owner']);
        $role->givePermissionTo([
            'company_management',
            'view_companies',
            'create_companies',
            'update_companies',
            'delete_companies',

            'view_products',
            'create_products',
            'update_products',
            'delete_products',
            ]);

        $role = Role::create(['name' => 'Accommodation Owner']);
        $role->givePermissionTo(['accommodation_management',
            'view_accommodation',
            'create_accommodation',
            'update_accommodation',
            'delete_accommodation',
            'view_rooms',
            'create_rooms',
            'update_rooms',
            'delete_rooms',
            ]);

        $role = Role::create(['name' => 'Event Venue Manager']);
        $role->givePermissionTo([
            'venue_management',
            'view_venue',
            'create_venue',
            'update_venue',
            'delete_venue',

            'view_events',
            'create_events',
            'update_events',
            'delete_events',
            ]);

        $role = Role::create(['name' => 'Blogger']);
        $role->givePermissionTo(['view_posts', 'create_posts', 'update_posts']);

        $role = Role::create(['name' => 'Customer']);
        $role->givePermissionTo(['order_management']);

//        $role = Role::create(['name' => 'Group Manager']);
//        $role->givePermissionTo(['group_management']);

//        $role = Role::create(['name' => 'Product Supplier']);
//        $role->givePermissionTo(['product_management']);

//        $role = Role::create(['name' => 'Event Host']);
//        $role->givePermissionTo(['event_management']);

    }
}
