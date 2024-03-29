<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tags')->truncate();

        $php = new Tag();
        $php->title = "PHP";
        $php->slug = "php";
        $php->save();

        $laravel = new Tag();
        $laravel->title = "Laravel";
        $laravel->slug = "laravel";
        $laravel->save();

        $symphony = new Tag();
        $symphony->title = "Symphony";
        $symphony->slug = "symphony";
        $symphony->save();

        $vue = new Tag();
        $vue->title = "Vue JS";
        $vue->slug = "vue-js";
        $vue->save();

        $tags = [
            $php->id,
            $laravel->id,
            $symphony->id,
            $vue->id
        ];

        foreach (Post::all() as $post)
        {
            shuffle($tags);

            for ($i = 0; $i < rand(0, count($tags)-1); $i++)
            {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }
    }
}
