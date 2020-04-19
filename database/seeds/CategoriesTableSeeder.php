<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title' => 'Web Desin',
                'slug' => 'web-desain'
            ],
            [
                'title' => 'Tips and Tricks',
                'slug' => 'tips-and-tricks'
            ],
            [
                'title' => 'Build Apps',
                'slug' => 'build-apps'
            ],
            [
                'title' => 'News',
                'slug' => 'news'
            ],
            [
                'title' => 'Freebies',
                'slug' => 'freebies'
            ],
        ]);
            // update the posts data

        for ($post_id = 1; $post_id <37; $post_id++)

        {
            $category_id = rand(1, 5);
            
            DB::table('posts')
            ->where('id', $post_id)
            ->update(['category_id' => $category_id]);
        }            
    }
}
