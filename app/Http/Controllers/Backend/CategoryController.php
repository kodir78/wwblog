<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Category;
use App\Post;

class CategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pagetitle = "All Category";
        
        // untuk memperbaiki query gunakan igger loading dengan menabahkan with
        $categories = Category::with('posts')->orderBy('title')->paginate($this->limit);
        $categoriesCount = Category::count();
        return view('backend.adminlte.categories.index', compact('categories', 'categoriesCount', 'Pagetitle', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new Category();
        return view('backend.adminlte.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryStoreRequest $request)
    {
        Category::create($request->all());
        return redirect('/backend/categories')->with('message','New Category was created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.adminlte.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect('/backend/categories')->with('message','Category was update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoryDestroyRequest $request,$id)
    {
        // menggunaakan cara ini  berhasil
        Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);
        
        // update semua id category ke uncotegorized untuk semua tulisan yang kctegorynya dihapus belum berfungsi
        // $category_id = $this->defaultcategory_id;
        // Post::withTrashed()->where('category_id', $id)->update(['category_id' => $category_id]);
        
        $categories = Category::findOrfail($id);
        $categories->delete();
        // Alert::success('Post succesfully Trash', 'Delete Success');
        return redirect()->back()->with('message', 'Your Categories Was Deleted');
    }
}
