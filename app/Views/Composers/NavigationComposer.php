<?php
namespace App\Views\Composers;

use Illuminate\View\View;
use App\Category;
use App\Post;
use App\Tag;

class NavigationComposer
{
    public function compose(View $view)
    {
        $this->composeCategories($view);
        
        $this->composeTags($view);

        $this->composePopularPost($view);
        
         $this->composeArchives($view);

    }

    private function composePopularPost(View $view)
    {
        $popularPosts =  Post::published()->popular()->take(3)->get();
        $view->with('popularPosts', $popularPosts);
    }
    
    private function composeCategories(View $view)
    {
        $categories =  Category::with(['posts'=> function($query){
                    $query->published();
        }])->orderBy('title', 'asc')->get();
        $view->with('categories', $categories);
    }

    private function composeTags(View $view)
    {
        // ambil semua tags yang memiliki relasi dengan post
        $tags = Tag::has('posts')->get();

        //lewatkan semua tags ke dalam view
        $view->with('tags', $tags);
    }
    //composer view untuk slider
    private function composeArchives(View $view)
    {
        // function static ada di model Post function archive
        $archives = Post::archives();

        $view->with('archives', $archives);
    }

}
