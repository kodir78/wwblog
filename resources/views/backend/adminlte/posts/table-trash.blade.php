<table class="table table-bordered table-hover">
    <thead>
        <tr>
          <th width="80">Action</th>
          <th>Title</th>
          <th width="150">Author</th>
          <th width="170">Category</th>
          <th width="180">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>

        @foreach ($posts as $post)
    
        <tr>
          <td>
              <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{route('posts.edit', $post->id)}}">
                  <i class="fa fa-edit"></i>
              </a>&nbsp;&nbsp;
              <a title="Delete" class="btn btn-xs btn-danger delete-row" href="#">
                  <i class="fa fa-times"></i>
              </a>
          </td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->author->name }}</td>
          <td>{{ $post->category->title }}</td>
          <td><abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> | {!! $post->publicationLabel() !!}</td>
        </tr>
        @endforeach
    </tbody>
  </table>