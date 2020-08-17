@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="offset-md-1 col-md-10 admin-column">
			<div class="card admin-card">
                <div class="card-header admin-card-header">
					<h1>Game Players</h1>
                </div>
				<div class="card-body admin-card-body">
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