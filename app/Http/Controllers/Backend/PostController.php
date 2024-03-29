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

use Intervention\Image\Facades\Image; // package upload image thumnail

class PostController extends BackendController
{
    
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
        $onlyTrashed = FALSE;
        $Pagetitle = "All Post";
        
        if (($status = $request->get('status')) && $status == 'trash') {
            # tampilkan table trash
            $filterKeyword = $request->get('keyword');
            $posts = Post::onlyTrashed()
            ->with('category', 'author')
            ->latest()
            ->paginate($this->limit);
            if($filterKeyword){
                $posts = Post::where("title", "LIKE",
                "%$filterKeyword%")->paginate($this->limit);
            }
            $postCount = ($tmp = Post::onlyTrashed()) ? $tmp->count() : 0;
            $onlyTrashed = TRUE;
        } 
        elseif ($status == 'published') {
            # Tampilkan semua data aktif
            $filterKeyword = $request->get('keyword');
            $posts = Post::published()->with('category', 'author')->latest()->paginate($this->limit);
            if($filterKeyword){
                $posts = Post::published()->where("title", "LIKE",
                "%$filterKeyword%")->paginate($this->limit);
            }
            $postCount = ($tmp = Post::published()) ? $tmp->count() : 0;
            
        }
        elseif ($status == 'scheduled') {
            # Tampilkan semua data aktif
            $filterKeyword = $request->get('keyword');
            $posts = Post::scheduled()->with('category', 'author')->latest()->paginate($this->limit);
            if($filterKeyword){
                $posts = Post::scheduled()->where("title", "LIKE",
                "%$filterKeyword%")->paginate($this->limit);
            }
            $postCount = ($tmp = Post::scheduled()) ? $tmp->count() : 0;
            
        }
        elseif ($status == 'draft') {
            # Tampilkan semua data aktif
            $filterKeyword = $request->get('keyword');
            $posts = Post::draft()->with('category', 'author')->latest()->paginate($this->limit);
            if($filterKeyword){
                $posts = Post::draft()->where("title", "LIKE",
                "%$filterKeyword%")->paginate($this->limit);
            }
            $postCount = ($tmp = Post::draft()) ? $tmp->count() : 0;
            
        }
        elseif ($status == 'own') {
            # Tampilkan semua data aktif
            $filterKeyword = $request->get('keyword');
            $posts = $request->user()->posts()->with('category', 'author')->latest()->paginate($this->limit);
            if($filterKeyword){
                $posts = $request->user()->posts()->where("title", "LIKE",
                "%$filterKeyword%")->paginate($this->limit);
            }
            $postCount = ($tmp = $request->user()->posts()) ? $tmp->count() : 0;
            
        }
        else {
            # Tampilkan semua data aktif
            $filterKeyword = $request->get('keyword');
            $posts = Post::with('category', 'author')->latest()->paginate($this->limit);
            if($filterKeyword){
                $posts = Post::where("title", "LIKE",
                "%$filterKeyword%")->paginate($this->limit);
            }
            $postCount = Post::count();
            
        }
        
        $statusList = $this->statusList($request);
        return view('backend.adminlte.posts.index', compact('posts', 'postCount', 'Pagetitle', 'onlyTrashed', 'statusList'));
        
    }
    
    private function statusList($request)
    {
        return [
            'own'       => ($tmp = $request->user()->posts()) ? $tmp->count() : 0,
            'all'       => Post::count(),
            'published' => ($tmp = Post::published()) ? $tmp->count() : 0,
            'scheduled' => ($tmp = Post::scheduled()) ? $tmp->count() : 0,
            'draft'     => ($tmp = Post::draft()) ? $tmp->count() : 0,
            'trash'     => ($tmp = Post::onlyTrashed()) ? $tmp->count() : 0,
        ];
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Post $post)
    {
        $Pagetitle = "Create Post";
        
        return view('backend.adminlte.posts.create', compact('post','Pagetitle'));
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
        
        // agar dapat menyimpan tags ke database, tampung create post ke variabel $newpost
        $newpost = $request->user()->posts()->create($data);
        
        // simpan data tags ke posts_tags dengan "attach"
        $newpost->createTags($data['post_tags']);
    
        Alert::success('Post succesfully created', 'Create Success');
        return redirect()->route('posts.index')->with('message','Post succesfully created');
    }
    
    // function handle upload image
    public function handleRequest($request)
    {
        $data = $request->all();
        
        if ($request->has('image')) {
            # upload with image
            $image = $request->file('image'); //SIMPAN SEMENTARA FILENYA KE VARIABLE
            //$fileName = $image->getClientOriginalName();
            $fileName = time().$image->getClientOriginalName(); //KITA GET ORIGINAL NAME-NYA
            //KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
            
            $destination = $this->uploadPath; //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS
            
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
                
                $category = Category::all();
                $post = Post::findOrFail($id);
                return view('backend.adminlte.posts.edit', compact('post','category', 'Pagetitle'));
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
                //cek gambar lama
                $oldImage = $post->image;
                $data = $this->handleRequest($request);
                // dd('post');
                
                $post->update($data);
                
                // simpan data hasil edit ke posts_tags dengan "sync"
                //$post->tags()->sync($request->post_tags);
                
                $post->createTags($data['post_tags']);

                // Jika gambar lama ada maka lakukan hapus gambar
                if ($oldImage !== $post->image) {
                    $this->removeImage($oldImage);
                }
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
                    return  redirect()->back()->with('message','Post successfuly Restored');
                } else {
                    # code...
                    Alert::success('Post is not in trash', 'Delete Success');
                    return redirect()->route('posts.index')->withc('message', 'Post is not in trash');
                }
            }
            
            public function forceDestroy($id)
            {
                $posts = Post::withTrashed()->findOrFail($id);
                // cara kedua
                // $posts = Post::witTrashed()->where('id', $id)->first();
                $posts->forceDelete();
                
                // hapus file gambar
                $this->removeImage($posts->image);
                
                Alert::success('Post succesfully Delete Permanent', 'Delete Success');
                
                return redirect('/backend/posts?status=trash')->with('message', 'Post permanently deleted');
                
            }
            
            // fucntion remove image
            private function removeImage($image)
            {
                if ( ! empty($image) )
                {
                    $imagePath     = $this->uploadPath . '/' . $image;
                    $ext           = substr(strrchr($image, '.'), 1);
                    $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
                    $thumbnailPath = $this->uploadPath . '/' . $thumbnail;
                    
                    if ( file_exists($imagePath) ) unlink($imagePath);
                    if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
                }
            }

            public function uploadImage()
            {
                if ($request->hasFile('upload')) {
                    $file = $request->file('upload'); //SIMPAN SEMENTARA FILENYA KE VARIABLE
                    $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //KITA GET ORIGINAL NAME-NYA
                    //KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
                    $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();
            
                    $destination1 = $this->uploadPath; //TENTUKAN FOLDER PUBLIC/UPLOADS
                    
                    //$file->move(public_path('uploads'), $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS
                    $file->move($destination1, $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS
                    
                    
                    //KEMUDIAN KITA BUAT RESPONSE KE CKEDITOR
                    $ckeditor = $request->input('CKEditorFuncNum');
                    $url = ($destination1 . $fileName); 
                    // $url = asset('uploads/' . $fileName); 
                    $msg = 'Image uploaded successfully'; 
                    //DENGNA MENGIRIMKAN INFORMASI URL FILE DAN MESSAGE
                    $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";
            
                    //SET HEADERNYA
                    @header('Content-type: text/html; charset=utf-8'); 
                    return $response;
                }
            }
            
        }
        