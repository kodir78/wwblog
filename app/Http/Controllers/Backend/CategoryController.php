<?php

namespace App\Http\Controllers\Backend;
use App\Category;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $categories = \App\Category::paginate(2);
        if($filterKeyword){
            $categories = \App\Category::where("title", "LIKE",
            "%$filterKeyword%")
            ->paginate(2);
        }
        $categoryCount = Category::count();
        return view('backend.categories.index', compact('categories', 'categoryCount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required|min:5|max:100",
            "image" => "required",
            ]);
            
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            
            $category = Category::create([
                'title' => $request->title,
                'image' => $new_image,
                'slug' => Str::slug($request->title),
                'created_by' => Auth::id()
                ]);
                
                $image->move('uploads/images/category/', $new_image);
                Alert::success('Category succesfully created', 'Create Success');
                return redirect()->route('categories.index');
                // return redirect()->back()->with('success','Ketegori berhasil disimpan');

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
        $category = \App\Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required|min:5|max:100",
            ]);
            
            $category = Category::findorfail($id);
            
            if ($request->has('image')){
                $image = $request->image;
                $new_image = time().$image->getClientOriginalName();
                $image->move('uploads/images/category/', $new_image);
                
                $category_data = [
                    'title' => $request->title,
                    'image' => $new_image,
                    'slug' => Str::slug($request->title),
                    'status' => $request->status,
                    'updated_by' => Auth::id()
                ];
            }
            else{
                $category_data = [
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'status' => $request->status,
                    'updated_by' => Auth::id()
                ];
            }
            $category->update($category_data);
            
            Alert::success('Category succesfully update', 'Update Success');
            return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $category->deleted_by = Auth::id();
        $category->delete();
        Alert::success('Category succesfully delete', 'Delete Success');
        return redirect()->back();
    }
}
