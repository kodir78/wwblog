<?php
namespace App\Views\Composers;

use Illuminate\View\View;
use App\Category;
use App\Post;
use App\Tag;

class NavigationComposer
{
    public function compose(view $view)
    {
        $this->composeCategories($view);

        $this->composePopularPost($view);

    }

    public function composeCategories(view $view)
    {
        $categories =  Category::with(['posts'=> function($query){
                    $query->published();
        }])->orderBy('title', 'asc')->get();
        $view->with('categories', $categories);
    }

    public function composePopularPost(view $view)
    {
        $popularPosts =  Post::published()->popular()->take(3)->get();
        $view->with('popularPosts', $popularPosts);
    }


}
