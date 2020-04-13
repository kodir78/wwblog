<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
// upload image thumnail
use Intervention\Image\Facades\Image;

class PostController extends BackendController
{
    protected $limit = 10;
    protected $uploadPath;
    
    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $Pagetitle = "All Post";
        $filterKeyword = $request->get('keyword');
        $posts = Post::with('category', 'author')
        ->latest()
        ->paginate($this->limit);
        if($filterKeyword){
            $posts = Post::where("title", "LIKE",
            "%$filterKeyword%")
            ->paginate($this->limit);
        }
        $postCount = Post::count();
        return view('backend.adminlte.posts.index', compact('posts', 'postCount', 'Pagetitle'));
        
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $Pagetitle = "Create Post";
        $tags = Tag::all();
        $category = Category::all();
        return view('backend.adminlte.posts.create', compact('category','tags','Pagetitle'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Requests\PostRequest $request)
    {
        // Validation rule Dipindahkan ke file App\HTTP\Request\PostRequest
        
        $data = $this->handleRequest($request);
        
        $request->user()->posts()->create($data);
        
        // simpan data ke posts_tags dengan "attach"
        //$request->tags()->attach($request->tags);
        
        Alert::success('Post succesfully created', 'Create Success');
        return redirect()->route('posts.index')->with('message','Post succesfully created');
    }
    
    // function handle upload image
    public function handleRequest($request)
    {
        $data = $request->all();
        
        if ($request->has('image')) {
            # upload with image
            $image = $request->file('image');
            //$fileName = $image->getClientOriginalName();
            $fileName = time().$image->getClientOriginalName();
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }
            //Simpan nama file ke database
            $data['image'] = $fileName;
        }
        
        return $data;
        
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        
        // $posts = Post::all();
        
        // // perintah menampilkan data ke json
        // //return response()->json($posts);
        
        
        // if($request->ajax()){
            //     return datatables()->of($posts)
            //     ->addColumn('action', function($data){
                //         $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                //         $button .= '&nbsp;&nbsp;';
                //         $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                //         return $button;
                //     })
                //     ->rawColumns(['action'])
                //     ->addIndexColumn()
                //     ->make(true);
                // }
                // return view('backend.posts.show1', compact('posts'));
                
            }
            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit($id)
            {
                $Pagetitle = "Edit Post";
                
                $tags = Tag::all();
                $category = Category::all();
                $post = Post::findOrFail($id);
                return view('backend.adminlte.posts.edit', compact('post','category','tags', 'Pagetitle'));
            }
            
            
            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Requests\PostRequest $request, $id)
            {
                $post = Post::findorfail($id);
                $data = $this->handleRequest($request);
                // dd('post');
                
                // simpan data hasil edit ke posts_tags dengan "sync"
                $post->tags()->sync($request->tags);
                $post->update($data);
                
                Alert::success('Post succesfully update', 'Create Success');
                return redirect(route('posts.index'))->with('message','Post succesfully update');
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            {
                $post = Post::findOrfail($id);
                $post->deleted_by = Auth::id();
                $post->delete();
                // Alert::success('Post succesfully Trash', 'Delete Success');
                return redirect()->back()->with('message', 'Your Post moved to Trash');
            }
            
            public function trash()
            {
                $posts = Post::onlyTrashed()->paginate(2);
                return view('backend.posts.trash', compact('posts'));
            }
            
            public function restore($id)
            {
                $posts = Post::withTrashed()->findOrFail($id);
                if ($posts->trashed()) {
                    # code...
                    $posts->restore();
                    Alert::success('Post succesfully Restore', 'Delete Success');
                    return redirect()->route('posts.index')->with('message','Post successfuly Restored');
                } else {
                    # code...
                    Alert::success('Post is not in trash', 'Delete Success');
                    return redirect()->route('posts.index')->withc('message', 'Post is not in trash');
                }
            }
            
            public function delete_permanent($id)
            {
                $posts = Post::withTrashed()->findOrFail($id);
                // cara kedua
                // $posts = Post::witTrashed()->where('id', $id)->first();
                $posts->forceDelete();
                Alert::success('Post succesfully Delete Permanent', 'Delete Success');
                return redirect()->route('posts.trash')->with('message', 'Post permanently deleted');
                
            }
            
        }
        