@extends('layouts.default')
@section('title')
    Welcome to Larabook!
@stop
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Welcome to Larabook!</h1>
        <p>Welcome tot he primer place to talk about laravel with others. Why don't you sign up to see what the fuss is about?</p>

        @if (!$currentUser)
            <p>
                {{HTML::linkRoute('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary'])}}
            </p>
        @endif
    </div>
@stop

