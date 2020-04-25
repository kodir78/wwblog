<?php

namespace App\Http\Controllers\Backend;
use App\Tag;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagsController extends BackendController
{
    protected $limit = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $tags = \App\Tag::paginate($this->limit);
        if($filterKeyword){
            $tags = \App\Tag::where("title", "LIKE",
            "%$filterKeyword%")
            ->paginate($this->limit);
        }
        $tagsCount = Tag::count();

        return view('backend.adminlte.tags.index', compact('tags','tagsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.adminlte.tags.create');

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
            ]);
            
            $tag = Tag::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'created_by' => Auth::id()
                ]);
                
                Alert::success('Tag succesfully created', 'Create Success');
                return redirect()->route('tags.index')->with('status','Tag succesfully created');
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
        $tag = Tag::findOrFail($id);
        return view('backend.adminlte.tags.edit', compact('tag'));
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
            
            $tag = Tag::findorfail($id);
            
                $tag_data = [
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'updated_by' => Auth::id()
                ];
        
            $tag->update($tag_data);
            
            Alert::success('Tag succesfully update', 'Update Success');
            return redirect()->route('tags.index')->with('status','Data sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::findorfail($id);
        $tags->deleted_by = Auth::id();
        $tags->delete();
        // Alert::success('Category succesfully delete', 'Delete Success');

        return redirect()->back()->with('status','Data berhasil dihapus');
    }
}
