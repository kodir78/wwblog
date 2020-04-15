<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Action</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Post Count</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($users as $user)
        
        <tr>
            <td>
                <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{route('users.edit', $user->id)}}">
                    <i class="fas fa-edit"></i>
                </a>&nbsp;&nbsp;
                <form  class="d-inline" action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    @if($user->id == config('cms.default_user_id'))
                    {{-- @if($user->id == 1) --}}
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
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $default_id }}</td>
            <td>{{ $user->posts->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>