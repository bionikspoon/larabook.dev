@if ($user->isFollowedBy($currentUser))
    <p>You are following {{$user->username}}.</p>
@else
    {{Form::open(['route' => 'follows_path'])}}
    {{Form::hidden('userIdToFollow', $user->id)}}
    {{Form::submit('Follow ' . $user->username, ['class' => 'btn btn-primary'])}}
    {{Form::close()}}
@endif

