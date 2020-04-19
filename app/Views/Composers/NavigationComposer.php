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
        
        // $this->composeSlider($view);

    }

    public function composePopularPost(View $view)
    {
        $popularPosts =  Post::published()->popular()->take(3)->get();
        $view->with('popularPosts', $popularPosts);
    }
    
    public function composeCategories(View $view)
    {
        $categories =  Category::with(['posts'=> function($query){
                    $query->published();
        }])->orderBy('title', 'asc')->get();
        $view->with('categories', $categories);
    }

    public function composeTags(View $view)
    {
        // ambil semua tags yang memiliki relasi dengan post
        $tags = Tag::has('posts')->get();

        //lewatkan semua tags ke dalam view
        $view->with('tags', $tags);
    }
    //composer view untuk slider
    public function composeSlider(View $view)
    {
        // ambil semua slider
        $slider = Slider::all();

        //lewatkan semua slider ke dalam view
        $view->with('slider', $slider);
    }

}
