@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="offset-md-2 col-md-10" style="margin-top:30px;">
			<div class="card" style="background-color:transparent;">
                <div class="card-header" style="color:#000;background:rgba(255, 255, 255, .6)">
					<h1>Game Players</h1>
                </div>
				<div class="card-body" style="background: #ffffff;">
					<ul>

					@foreach ($users as $user)

					<li>{{ $user->name }} - <a href="{{ url('admin/delete/'.$user->id) }}">delete</a></li>

					@endforeach

					</ul>
				</div>
				<div class="card-footer">
					<a href="{{ route('admin.home') }}" class="btn btn-light btn-sm">Cancel</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection