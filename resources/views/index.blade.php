@extends('master')
@section('contents')
    <header>
        <span class="avatar"><img src="images/users/{{ $user->id ?? '' }}.jpg" alt="" /></span>
        <h1>{{ $user->name ?? '' }}</h1>
        <p>{{ $user->comments->comments ?? '' }}</p>
    </header>
@endsection