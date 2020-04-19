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
                'title' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'title' => 'Web Design',
                'slug' => 'web-design'
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
                'title' => 'Freebies',
                'slug' => 'freebies'
            ],
        ]);
            // update the posts data
            //for ($post_id = 1; $post_id <37; $post_id++)
            // Perbaikan
        foreach (Post::pluck('id') as $postId)

        {
            // Kumpulkan id categori dari database
            $categories = Category::pluck('id');
            $categoryId = $categories[rand(0, $categories->count()-1)];
            
            DB::table('posts')
            ->where('id', $postId)
            ->update(['category_id' => $categoryId]);
        }            
    }
}
