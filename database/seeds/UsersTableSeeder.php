<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
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

      $admin_role = Role::where('id',1)->first();
      $manager_role = Role::where('id',2)->first();
      $blogger_role = Role::where('id',3)->first();
      $company_management = Role::where('id',4)->first();
      $group_management = Role::where('id',5)->first();
      $event_management = Role::where('id',6)->first();
      $product_management = Role::where('id',7)->first();
      $customer_manager = Role::where('id',8)->first();

      $admin = new User();
      $admin->username = 'jordantsap';
      $admin->active = 1;
      $admin->fullname = 'JordanTsap';
      $admin->tel = '2510316852';
      $admin->mobile = '6984262910';
      $admin->email = 'jordantsap@hotmail.gr';
      $admin->password = bcrypt('123456');
      $admin->save();
      $admin->roles()->attach($admin_role);

      $manager = new User();
      $manager->username = 'manager';
      $manager->active = 1;
      $manager->fullname = 'manager';
      $manager->tel = '2510316852';
      $manager->mobile = '6984262910';
      $manager->email = 'manager@gmail.com';
      $manager->password = bcrypt('123456');
      $manager->save();
      $manager->roles()->attach($manager_role);

      $blogger = new User();
      $blogger->username = 'blogger';
      $blogger->active = 1;
      $blogger->fullname = 'blogger';
      $blogger->tel = '2510316852';
      $blogger->mobile = '6984262910';
      $blogger->email = 'blogger@gmail.com';
      $blogger->password = bcrypt('123456');
      $blogger->save();
      $blogger->roles()->attach($blogger_role);

      /*-----------------------------*/
      $company_manager = new User();
      $company_manager->username = 'companyManager';
      $company_manager->active = 1;
      $company_manager->fullname = 'companyManager';
      $company_manager->tel = '2510316852';
      $company_manager->mobile = '6984262910';
      $company_manager->email = 'company@gmail.com';
      $company_manager->password = bcrypt('123456');
      $company_manager->save();
      $company_manager->roles()->attach($company_management);

      $group_manager = new User();
      $group_manager->username = 'groupManager';
      $group_manager->active = 1;
      $group_manager->fullname = 'groupManager';
      $group_manager->tel = '2510316852';
      $group_manager->mobile = '6984262910';
      $group_manager->email = 'group@gmail.com';
      $group_manager->password = bcrypt('123456');
      $group_manager->save();
      $group_manager->roles()->attach($group_management);

      $event_manager = new User();
      $event_manager->username = 'eventManager';
      $event_manager->active = 1;
      $event_manager->fullname = 'eventManager';
      $event_manager->tel = '2510316852';
      $event_manager->mobile = '6984262910';
      $event_manager->email = 'event@gmail.com';
      $event_manager->password = bcrypt('123456');
      $event_manager->save();
      $event_manager->roles()->attach($event_management);

      $product_manager = new User();
      $product_manager->username = 'productManager';
      $product_manager->active = 1;
      $product_manager->fullname = 'productManager';
      $product_manager->tel = '2510316852';
      $product_manager->mobile = '6984262910';
      $product_manager->email = 'product@gmail.com';
      $product_manager->password = bcrypt('123456');
      $product_manager->save();
      $product_manager->roles()->attach($product_management);

      $customer = new User();
      $customer->username = 'customer';
      $customer->active = 1;
      $customer->fullname = 'customer';
      $customer->tel = '2510316852';
      $customer->mobile = '6984262910';
      $customer->email = 'customer@gmail.com';
      $customer->password = bcrypt('123456');
      $customer->save();
      $customer->roles()->attach($customer_manager);

    }
}
