<table class="table table-hover table-bordered">
    <thead class="text-center">
        <tr>
            <th style="width: 80px">Action</th>
            <th>Title</th>
            {{--  <th>Author</th>  --}}
            <th>Category</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>
        
        @foreach ($posts as $post)
        
        <tr>
            <td>
                <form  class="d-inline" action="{{route('posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    @if (check_user_permissions($request, "Posts@edit", $post->id))
                    <a href="{{route('posts.edit', $post->id)}}" title="Edit" class="btn btn-xs btn-default edit-row" >
                        <i class="fas fa-edit"></i>
                    </a>&nbsp;&nbsp;
                    @else
                    <a href="#" title="Not Autorized" class="btn btn-xs btn-default edit-row disabled" >
                        <i class="fas fa-edit"></i>
                    </a>&nbsp;&nbsp;
                    @endif
                    @if (check_user_permissions($request, "Posts@destroy", $post->id))
                    <button title="Move Trash" type="submit" class="btn btn-danger btn-xs delete-row">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    @else
                    <button title="Not Autorized" onclick="return false" class="btn btn-danger btn-xs delete-row disabled">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    @endif
                </form>
            </td>
            <td>
                {{ substr(strip_tags($post->title), 0, 60) }} [...] <br>
                <small><strong>{{ $post->author->name }}</strong></small>
            </td>
            {{--  <td>{{ $post->author->name }}</td>  --}}
            <td>{{ $post->category->title }}</td>
            <td><abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> | {!! $post->publicationLabel() !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>