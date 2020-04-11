<div class="col-8">
    <div class="card">
        <div class="card-header">
            <h4>Write Your Post</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{old('title') ? old('title') : $post->title}}" class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Post Title" tabindex="1" type="text" name="title" id="title"/>
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input value="{{old('slug') ? old('slug') : $post->slug}}" class="form-control {{$errors->first('slug') ? "is-invalid": ""}}" readonly placeholder="Slug" type="text" name="slug" id="slug"/>
                <div class="invalid-feedback">
                    {{$errors->first('slug')}}
                </div>
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea  class="form-control summernote-simple" tabindex="2" name="excerpt" id="excerpt" class="form-control {{$errors->first('excerpt') ? "is-invalid" : "" }}">{{ $post->excerpt }}</textarea>
                <div class="invalid-feedback">
                    {{$errors->first('excerpt')}}
                </div>
            </div>
            <div class="form-group">
                <label for="body">Body Content</label>
                <textarea  class="form-control" name="body" tabindex="3" id="body" class="form-control {{$errors->first('body') ? "is-invalid" : "" }}">{{ $post->excerpt }}</textarea>
                <div class="invalid-feedback">
                    {{$errors->first('body')}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-4">
    <div class="card">
        <div class="card-header">
            <h4>Publish</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="published_at">Published Date</label>
                <input value="{{old('title') ? old('title') : $post->title}}" class="form-control {{$errors->first('published_at') ? "is-invalid": ""}} datetimepicker" placeholder="Y-m-d H:i:s" type="text" name="published_at" id="published_at"/>
                <div class="invalid-feedback">
                    {{$errors->first('published_at')}}
                </div>
                <br>
                <a class="btn btn-info text-white" id="draft-btn">Save Draft</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary" type="submit" value="save">Publish</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Category</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control {{$errors->first('category_id') ? "is-invalid": ""}} selectric" name="category_id" id="category_id">
                    <option value="" holder>Select Category</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id}}">{{ $item->title }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{$errors->first('category_id')}}
                </div>
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label>
                <select class="form-control {{$errors->first('tags') ? "is-invalid": ""}} select2" multiple name="tags[]" id="tags">
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">
                        {{ $tag->title }}
                    </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{$errors->first('tags')}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        
    </div>
    <div class="card-body">
        <div class="form-group">
            <select class="form-control {{$errors->first('category_id') ? "is-invalid": ""}} selectric" name="category_id" id="category_id">
                
                {{--  --}}
                    @foreach($category as $item)
                    <option value="{{ $item->id }}"
                        @if($item->id == $post->category_id)
                        selected
                        @endif
                        >{{  $item->title }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Feature Image</h4>
        </div>
        <div class="card-body">
            <div class="form-group text-center">
                @if($post->imageUrl)
                <img src="{{$post->imageUrl}}" width="150px" />
                <br><br>
                @else
                <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture" width="120px">
                <br><br>
                @endif  
                <input type="file" class="form-control {{$errors->first('image') ? "is-invalid": ""}}" name="image" id="image" />
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>
            {{-- <div class="form-group row mb-4">
                <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" value="<img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">" name="image" id="image-upload" />
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>