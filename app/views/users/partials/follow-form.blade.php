@if($signedIn)
    @if ($user->isFollowedBy($currentUser))
        {{Form::open(['method' => 'DELETE', 'route' => ['unfollows_path', $user->id]])}}
        {{Form::hidden('userIdToUnfollow', $user->id)}}
        {{Form::submit('Unfollow ' . $user->username, ['class' => 'btn btn-danger'])}}
        {{Form::close()}}
    @else
        {{Form::open(['route' => 'follows_path'])}}
        {{Form::hidden('userIdToFollow', $user->id)}}
        {{Form::submit('Follow ' . $user->username, ['class' => 'btn btn-primary'])}}
        {{Form::close()}}
    @endif
@endif
