<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
use App\Category;
use App\Slider;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    
    protected $limit = 6;
    public function index(Post $posts)
    {
        
        //$sliders = Slider::all();
        $posts = Post::with('author', 'category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->filter(request()->only(['term', 'year', 'month']))
                        // ->take(6)
                        ->paginate($this->limit);
                        //->get();
        
        return view('frontend.sikka.index', compact('posts'));
    }
    
    public function category(Category $category)
    {
        $title = "Category";
        $categoryName = $category->title;
        
        $posts = $category->posts()
                        ->with('author', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->take(6)
                        ->paginate($this->limit);
        
        return view("frontend.sikka.index", compact('posts', 'categoryName', 'title'));
        
    }
    public function tag(Tag $tag)
    {
        $title = "Tagged";
        $tagName = $tag->title;
        
        $posts = $tag->posts()
                    ->with('author', 'category', 'comments')
                    ->latestFirst()
                    ->published()
                    ->take(6)
                    ->paginate($this->limit);
        
        return view("frontend.sikka.index", compact('posts', 'tagName', 'title'));
        
    }
    // list berdasrkan author belum selesai
    public function author(User $author)
    {
        $title = "Author";
        $authorName = $author->name;
        $posts = $author->posts()
                        ->with('category', 'tags', 'comments')
                        ->latestFirst()
                        ->published()
                        ->take(6)
                        ->paginate($this->limit);
        
        return view("frontend.sikka.index", compact('posts', 'authorName', 'title'));
        
    }

    public function slider(Slider $slider)
    {
        $sliderName = $slider->slug;

        return view("frontend.sikka.index", compact('posts', 'sliderName', 'title'));
        
    }

    public function show(Post $post)
    {
        // pada function ini kita kelola juga comments
        // before
       // $post->increment('view_count');

        //after
        $title = "Detail Post";
        $post->increment('view_count');
        $postComments = $post->comments()->paginate(3);

        return view('frontend.sikka.show', compact('post', 'postComments', 'tags'));
    }
    
    public function allposts(Post $posts)
    {
        $categories = Category::all();
        $posts = Post::with('author')
        ->latest()
        ->take(6)
        ->paginate($this->limit);
        //->get();
        return view('frontend.sikka.gridblog', compact('posts', 'categories'));
    }
    
}
