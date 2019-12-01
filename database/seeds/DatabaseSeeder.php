<?php

use Illuminate\Database\Seeder;
use App\User;

use Spatie\Permission\Models\Role;
use App\Permission; //Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::unguard();

    //disable foreign key check for this connection before running seeders
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      app()['cache']->forget('spatie.permission.cache');

          $this->call(AlbumsTableSeeder::class);
          $this->call(AlbumPhotosTableSeeder::class);
          $this->call(PermissionTableSeeder::class);
          $this->call(RoleTableSeeder::class);
          $this->call(UsersTableSeeder::class);
          // $this->call(RolesAndPermissionsSeeder::class);
          // $this->call(CustomersTableSeeder::class);
          $this->call(CompaniesTableSeeder::class);
          $this->call(EventsTableSeeder::class);
          $this->call(GroupsTableSeeder::class);
          $this->call(PostsTableSeeder::class);
          $this->call(PostTypeSeeder::class);
          $this->call(ProductsTableSeeder::class);
          // $this->call(TagsTableSeeder::class);
          $this->call(CompanyTypeSeeder::class);
          $this->call(GroupTypeSeeder::class);
          $this->call(ProductTypeSeeder::class);

         // supposed to only apply to a single connection and reset it's self
      // but I like to explicitly undo what I've done for clarity
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');


      User::reguard();
    }
}
