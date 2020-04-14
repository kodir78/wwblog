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
        $sliders = Slider::all();
        $tags = Tag::all();
        // \DB::enableQueryLog();
        $posts = Post::with('author')
                ->latestFirst()
                ->published()
                ->take(6)
                ->paginate($this->limit);
                //->get();
       return view('frontend.sikka.index', compact('posts', 'sliders', 'tags'));
        // dd(\DB::getQueryLog());
    }

    public function category(Category $category)
    {
        $title = "Kategori";
        $categoryName = $category->title;
        $tags = Tag::all();
        $posts = $category->posts()
                          ->latestFirst()
                          ->published()
                          ->take(6)
                          ->with('author')
                          ->paginate($this->limit);

        return view("frontend.sikka.filter", compact('posts', 'title', 'categoryName'));

    }
    public function show(Post $post)
    {
        $title = "Detail Post";
        $tags = Tag::all();
        //Kategori sasi dipindah ke provider
        //bagaimana caranya Tags dipindah ke provider
        // $posts = Post::where('slug', $slug)
        //                 ->first()
        //                 ->published()
        //                 ->get();
        // Menghitung jumlah pembaca, hal ini setiap browser di refresh maka akan bertambah, sebaiknya gunakan cara sessin atau catat ip address
              
        $post->increment('view_count');
        return view('frontend.sikka.show', compact('post', 'tags'));
    }
    
       // list berdasrkan author belum selesai
    public function author(User $author)
    {
        $title = "Filter Penulis";
        $categoryName = $author->name;
        $tags = Tag::all();
        $posts = $author->posts()
                          ->latestFirst()
                          ->published()
                          ->take(6)
                          ->with('category')
                          ->paginate($this->limit);

        return view("frontend.sikka.filter", compact('posts', 'title', 'categoryName'));

    }

    public function search(request $request)
    {
        $title = "Hasil Pencarian";
        $tags = Tag::all();
        $categories = Category::all();
        $filterKeyword = $request->get('keyword');
        $posts = \App\Post::with('category', 'author')
                ->paginate($this->limit);
        if($filterKeyword){
            $posts = \App\Post::where("title", "LIKE",
            "%$filterKeyword%")
            ->paginate($this->limit);
        }
        
        return view('frontend.sikka.search', compact('posts','categories', 'title'));
        
        // $categories = Category::all();

        // $posts = Post::where('judul', $request->cari)
        //         ->orWhere('judul','like','%'.$request->cari.'%')
        //         ->paginate($this->limit);
        // return view('frontend.sikka.index', compact('posts','categories'));
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
