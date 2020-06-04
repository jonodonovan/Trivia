@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row align-items-center h-50">
        <div class="col-10 mx-auto">
            <h1 style="color:white;font-size:6rem;">Trivia</h1>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">{{ __('Join a Game') }}</a>
        </div>
    </div>
</div>
@endsection