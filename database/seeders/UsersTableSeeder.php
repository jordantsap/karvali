<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $superadmin_role = Role::where('name','Super-Admin')->first();
        $admin_role = Role::where('name', 'Admin')->first();
        $company_management = Role::where('name','Company/Products Owner')->first();
        $accommodation_management = Role::where('name','Accommodation/Rooms Owner')->first();

        $venue_management = Role::where('name','Venue/Event Owner')->first();
        $group_management = Role::where('name','Group/Event Owner')->first();
        $blog_management = Role::where('name', 'Blogger')->first();
        $customer_role = Role::where('name','Customer')->first();


        $admin = new User();
        $admin->username = 'jordantsap';
        $admin->active = 1;
        $admin->fullname = 'JordanTsap';
        $admin->tel = '2510316852';
        $admin->mobile = '6984262910';
        $admin->email = 'dev@karvali.local';
        $admin->password = bcrypt('123456');
        $admin->email_verified_at = now();
        $admin->save();
        $admin->roles()->attach($superadmin_role);

        $manager = new User();
        $manager->username = 'manager';
        $manager->active = 1;
        $manager->fullname = 'manager';
        $manager->tel = '2510316852';
        $manager->mobile = '6984262910';
        $manager->email = 'manager@karvali.local';
        $manager->password = bcrypt('123456');
        $manager->email_verified_at = now();
        $manager->save();
        $manager->roles()->attach($admin_role);

        /*-----------------------------*/
        $company_manager = new User();
        $company_manager->username = 'companyManager';
        $company_manager->active = 1;
        $company_manager->fullname = 'companyManager';
        $company_manager->tel = '2510316852';
        $company_manager->mobile = '6984262910';
        $company_manager->email = 'company@karvali.local';
        $company_manager->password = bcrypt('123456');
        $company_manager->email_verified_at = now();
        $company_manager->save();
        $company_manager->roles()->attach($company_management);


        $event_manager = new User();
        $event_manager->username = 'accommodationManager';
        $event_manager->active = 1;
        $event_manager->fullname = 'accommodationManager';
        $event_manager->tel = '2510316852';
        $event_manager->mobile = '6984262910';
        $event_manager->email = 'accommodation@karvali.local';
        $event_manager->password = bcrypt('123456');
        $event_manager->email_verified_at = now();
        $event_manager->save();
        $event_manager->roles()->attach($accommodation_management);


        $venue_management = new User();
        $venue_management->username = 'venueManager';
        $venue_management->active = 1;
        $venue_management->fullname = 'venueManager';
        $venue_management->tel = '2510316852';
        $venue_management->mobile = '6984262910';
        $venue_management->email = 'venue@karvali.local';
        $venue_management->password = bcrypt('123456');
        $venue_management->email_verified_at = now();
        $venue_management->save();
        $venue_management->roles()->attach($venue_management);

        $group_manager = new User();
        $group_manager->username = 'groupManager';
        $group_manager->active = 1;
        $group_manager->fullname = 'venueManager';
        $group_manager->tel = '2510316852';
        $group_manager->mobile = '6984262910';
        $group_manager->email = 'group@karvali.local';
        $group_manager->password = bcrypt('123456');
        $group_manager->email_verified_at = now();
        $group_manager->save();
        $group_manager->roles()->attach($group_management);


        $blogger = new User();
        $blogger->username = 'blogger';
        $blogger->active = 1;
        $blogger->fullname = 'blogger';
        $blogger->tel = '2510316852';
        $blogger->mobile = '6984262910';
        $blogger->email = 'blogger@karvali.local';
        $blogger->password = bcrypt('123456');
        $blogger->email_verified_at = now();
        $blogger->save();
        $blogger->roles()->attach($blog_management);

        $customer = new User();
        $customer->username = 'customer';
        $customer->active = 1;
        $customer->fullname = 'customer';
        $customer->tel = '2510316852';
        $customer->mobile = '6984262910';
        $customer->email = 'customer@karvali.local';
        $customer->password = bcrypt('123456');
        $customer->email_verified_at = now();
        $customer->save();
        $customer->roles()->attach($customer_role);

//        $group_manager = new User();
//        $group_manager->username = 'groupManager';
//        $group_manager->active = 1;
//        $group_manager->fullname = 'groupManager';
//        $group_manager->tel = '2510316852';
//        $group_manager->mobile = '6984262910';
//        $group_manager->email = 'group@karvali.local';
//        $group_manager->password = bcrypt('123456');
//        $group_manager->save();
//        $group_manager->roles()->attach($group_management);

//        $product_manager = new User();
//        $product_manager->username = 'productManager';
//        $product_manager->active = 1;
//        $product_manager->fullname = 'productManager';
//        $product_manager->tel = '2510316852';
//        $product_manager->mobile = '6984262910';
//        $product_manager->email = 'product@karvali.local';
//        $product_manager->password = bcrypt('123456');
//        $product_manager->email_verified_at = now();
//        $product_manager->save();
//        $product_manager->roles()->attach($product_management);

    }
}
