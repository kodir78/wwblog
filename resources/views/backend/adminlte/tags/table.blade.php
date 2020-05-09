<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Action</th>
            <th>Tags Name</th>
            <th>Post Count</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($tags as $tag)
        
        <tr>
            <td>
                <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{route('tags.edit', $tag->id)}}">
                    <i class="fas fa-edit"></i>
                </a>&nbsp;&nbsp;
                <form  class="d-inline" action="{{route('tags.destroy', $tag->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    @if($tag->id == config('cms.default_tag_id'))
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                    @else
                    <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                    @endif 
                </form>
            </td>
            <td>{{ $tag->title }}</td>
            <td>{{ $tag->posts->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>