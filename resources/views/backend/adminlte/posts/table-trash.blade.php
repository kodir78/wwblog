<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Action</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>
        
        @foreach ($posts as $post)
        
        <tr>
            <td>
                <form  class="d-inline" action="{{route('posts.forceDestroy', $post->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    @if (check_user_permissions($request, "Posts@restore", $post->id))
                    <a href="{{route('posts.restore', $post->id)}}" title="Restore" class="btn btn-xs btn-default edit-row" >
                        <i class="fas fa-redo"></i>
                    </a>&nbsp;&nbsp;
                    @else
                    <a href="#" title="Not Autorized" class="btn btn-xs btn-default edit-row disabled">
                        <i class="fas fa-redo"></i>
                    </a>&nbsp;&nbsp;
                    @endif
                    @if (check_user_permissions($request, "Posts@forceDestroy", $post->id))
                        <button title="Delete Permanen" onclick="return confirm('You are about to delete a post pemanentnly. Are you sure?')" type="submit" class="btn btn-danger btn-xs delete-row">
                            <i class="fas fa-times"></i>
                        </button>
                    @else
                        <button title="Delete Permanen" onclick="return false" class="btn btn-danger btn-xs delete-row disabled">
                            <i class="fas fa-times"></i>
                        </button>
                        
                    @endif
                </form>
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author->name }}</td>
            <td>{{ $post->category->title }}</td>
            <td><abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> | {!! $post->publicationLabel() !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>