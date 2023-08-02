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
            'view-events',
            'view-products',
//            'view-groups',
            'view-companies',
            'view-users',
            'create-users',
            'update-users',
            'create-posts',
            'update-posts',
            'view-posts']);

        /*----------------------------*/
        $role = Role::create(['name' => 'Company/Products Owner']);
        $role->givePermissionTo([
            'company-management',
            'view-companies',
            'create-companies',
            'update-companies',
            'delete-companies',

            'view-products',
            'create-products',
            'update-products',
            'delete-products',
            ]);

        $role = Role::create(['name' => 'Accommodation/Rooms Owner']);
        $role->givePermissionTo(['accommodation-management',
            'view-accommodation',
            'create-accommodation',
            'update-accommodation',
            'delete-accommodation',
            'view-rooms',
            'create-rooms',
            'update-rooms',
            'delete-rooms',
            ]);

        $role = Role::create(['name' => 'Venue/Event Owner']);
        $role->givePermissionTo([
            'venue-management',
            'view-venue',
            'create-venue',
            'update-venue',
            'delete-venue',

            'view-events',
            'create-events',
            'update-events',
            'delete-events',
            ]);

        $role = Role::create(['name' => 'Blogger']);
        $role->givePermissionTo(['view-posts', 'create-posts', 'update-posts']);

        $role = Role::create(['name' => 'Customer']);
        $role->givePermissionTo(['order-management']);

//        $role = Role::create(['name' => 'Group Manager']);
//        $role->givePermissionTo(['group-management']);

//        $role = Role::create(['name' => 'Product Supplier']);
//        $role->givePermissionTo(['product-management']);

//        $role = Role::create(['name' => 'Event Host']);
//        $role->givePermissionTo(['event-management']);

    }
}
