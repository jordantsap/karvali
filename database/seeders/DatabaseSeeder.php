<?php
namespace Database\Seeders;

//use Database\Seeders\{AlbumsTableSeeder,
//    AlbumPhotosTableSeeder,
//    CompaniesTableSeeder,
//    CompanyTypeSeeder,
//    EventsTableSeeder,
//    GroupsTableSeeder,
//    GroupTypeSeeder,
//    PermissionTableSeeder,
//    PostsTableSeeder,
//    PostTypeSeeder,
//    ProductsTableSeeder,
//    ProductTypeSeeder,
//    RoleTableSeeder,
//    UsersTableSeeder};
use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;
use App\Models\Permission; //Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

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

          $this->call(PermissionTableSeeder::class);
          $this->call(RoleTableSeeder::class);
          $this->call(UsersTableSeeder::class);

          $this->call(PostTypeSeeder::class);
          $this->call(CompanyTypeSeeder::class);
          $this->call(GroupTypeSeeder::class);
          $this->call(ProductTypeSeeder::class);



          $this->call(VenueSeeder::class);

          $this->call(EventsTableSeeder::class);
          $this->call(AlbumsTableSeeder::class);
          $this->call(AlbumPhotosTableSeeder::class);
          $this->call(CompaniesTableSeeder::class);
          $this->call(GroupsTableSeeder::class);
          $this->call(PostsTableSeeder::class);
          $this->call(ProductsTableSeeder::class);

          // just for reference
//           $this->call(TagsTableSeeder::class);
//         $this->call(RolesAndPermissionsSeeder::class);
//         $this->call(CustomersTableSeeder::class);

         // supposed to only apply to a single connection and reset it's self
      // but I like to explicitly undo what I've done for clarity
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');


      User::reguard();
    }
}
