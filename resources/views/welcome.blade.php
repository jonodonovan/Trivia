@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-md-1 col-md-10 text-center">
            <h1 style="font-size: 6rem;">Trivia Game</h1>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">{{ __('Join a Game') }}</a>
        </div>
    </div>
</div>
@endsection