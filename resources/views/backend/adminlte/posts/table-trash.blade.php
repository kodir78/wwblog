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
                <a title="Restore" class="btn btn-xs btn-default edit-row" href="{{route('posts.restore', $post->id)}}">
                    <i class="fas fa-redo"></i>
                </a>&nbsp;&nbsp;
                <form  class="d-inline" action="{{route('posts.kill', $post->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button title="Delete Permanen" onclick="return confirm('You are about to delete a post pemanentnly. Are you sure?')" type="submit" class="btn btn-danger btn-xs delete-row"><i class="fas fa-times"></i></button>
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