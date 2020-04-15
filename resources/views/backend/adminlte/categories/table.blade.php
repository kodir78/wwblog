<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Action</th>
            <th>Category Name</th>
            <th>Post Count</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($categories as $category)
        
        <tr>
            <td>
                <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{route('categories.edit', $category->id)}}">
                    <i class="fas fa-edit"></i>
                </a>&nbsp;&nbsp;
                <form  class="d-inline" action="{{route('categories.destroy', $category->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    @if($category->id == config('cms.default_category_id'))
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
            <td>{{ $category->title }}</td>
            <td>{{ $category->posts->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>