@extends('layouts.default')
@section('title')
    Welcome to Larabook!
@stop
@section('content')
    <h1>Register!</h1>

    {{Form::open(['action' => 'register_path'])}}

    <!-- Username Form Input -->
    <div class="form-group">
        {{Form::label('username', 'Username:')}}
        {{Form::text('username', Form::old('username'), ['class'=>'form-control'])}}
    </div>

    <!-- Email Form Input -->
    <div class="form-group">
        {{Form::label('email', 'Email:')}}
        {{Form::email('email', Form::old('email'), ['class'=>'form-control'])}}
    </div>

    <!-- Password Form Input -->
    <div class="form-group">
        {{Form::label('password', 'Password:')}}
        {{Form::password('password', ['class'=>'form-control'])}}
    </div>

    <!-- Password Confirmation Form Input -->
    <div class="form-group">
        {{Form::label('password_confirmation', 'Password Confirmation:')}}
        {{Form::password('password_confirmation', ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::submit('Sign Up', ['class' => 'btn btn-primary'])}}
    </div>

    {{Form::close()}}
@stop

