<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        // $blogs = factory(Post::class, 15)->create();
        app()->setLocale('en');

        $post1 = new Post();
        $post1->title = 'My Awesome Post';
        $post1->description = 'This is some cool paragraph';
        $post1->user_id = rand(1,5);
        $post1->post_type = rand(1,5);
        $post1->active = 1;
        $post1->meta_description = 'Un chouette texte qui vous raconte des choses';
        $post1->meta_keywords = 'Un chouette texte qui vous raconte des choses';
        $post1->save();

        $post2 = new Post();
        $post2->title = 'The Second Amazing Subject';
        $post2->description = 'A very nice text about how things work somewhere';
        $post2->user_id = rand(1,5);
        $post2->post_type = rand(1,5);
        $post2->active = 1;
        $post2->meta_description = 'Un chouette texte qui vous raconte des choses';
        $post2->meta_keywords = 'Un chouette texte qui vous raconte des choses';
        $post2->save();

        app()->setLocale('el');

        $post1->title = 'Mon Super Article';
        $post1->description = 'Ceci est le contenu stylé de mon article';
        $post1->user_id = rand(1,5);
        $post1->post_type = rand(1,5);
        $post1->active = 1;
        $post1->meta_description = 'Un chouette texte qui vous raconte des choses';
        $post1->meta_keywords = 'Un chouette texte qui vous raconte des choses';
        $post1->save();

        $post2->title = 'Le Deuxième sujet génial';
        $post2->description = 'Un chouette texte qui vous raconte des choses';
        $post2->user_id = rand(1,5);
        $post2->post_type = rand(1,5);
        $post2->active = 1;
        $post2->meta_description = 'Un chouette texte qui vous raconte des choses';
        $post2->meta_keywords = 'Un chouette texte qui vous raconte des choses';
        $post2->save();
//        Post::factory()->count(12)->create();
    }
}
