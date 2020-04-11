<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Slider;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class SliderController extends BackendController
{
    protected $limit = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $title = "All Sliders";
        // $sliders = Slider::all();
        $filterKeyword = $request->get('keyword');
        $sliders = Slider::with('user')
        ->paginate($this->limit);
        if($filterKeyword){
            $sliders = Slider::where("title", "LIKE",
            "%$filterKeyword%")
            ->paginate($this->limit);
        }
        return view('backend.sliders.index', compact('sliders', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Slider";
        return view('backend.sliders.create', compact('title'));
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
            "title" => "required|min:5|max:200",
            "url" => "required|min:1",
            "image" => "required",
            ]);
            
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            
            $post = Slider::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'url' => $request->url,
                'image' => $new_image,
                'created_by' => Auth::id()
                ]);
                
                $image->move('public/uploads/images/sliders/', $new_image);
                Alert::success('Sliders succesfully created', 'Create Success');
                return redirect()->route('sliders.index')->with('status','Sliders succesfully created');
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
        $title = "Edit Slider";
        $slider = Slider::findOrFail($id);
        return view('backend.sliders.edit', compact('slider','title'));
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
                "title" => "required|min:5|max:200",
                "url" => "required|min:1",
                ]);
            
            $slider = slider::findorfail($id);
            
            if ($request->has('image')) {
                # update with image
                $image = $request->image;
                $new_image = time().$image->getClientOriginalName();
               
                $image->move('public/uploads/images/sliders/', $new_image);
                
                $slider_data = [
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'url' => $request->url,
                    'image' => $new_image,
                    'updated_by' => Auth::id()
                ];
                
            }
            else{
                # update without image
                $slider_data = [
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'url' => $request->url,
                    'updated_by' => Auth::id()
                ];
            }
            // simpan data hasil edit ke sliders_tags dengan "sync"
            $slider->update($slider_data);
            
            Alert::success('slider succesfully update', 'Update Success');
            return redirect(route('sliders.index'))->with('status','slider succesfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrfail($id);
                    $slider->deleted_by = Auth::id();
                    $slider->delete();
                    Alert::success('slider succesfully Trash', 'Delete Success');
                    return redirect()->back()->with('success', 'slider successfuly Trash');
    }
}
