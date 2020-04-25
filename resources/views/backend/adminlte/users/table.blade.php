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
        <?php $currentUser = auth()->user(); ?>
        @foreach ($users as $user)
        
        <tr>
            <td>
                <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{route('users.edit', $user->id)}}">
                    <i class="fas fa-edit"></i>
                </a>&nbsp;&nbsp;
               
                    @if($user->id == config('cms.default_user_id') || $user->id == $currentUser->id)
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                    @else
                    <a href="{{ route('users.confirm', $user->id) }}" type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                    @endif 
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            {{-- <td>{{ $user->roles->first()->display_name }}</td> --}}
            <td>{{ $user->posts->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>