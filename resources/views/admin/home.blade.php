@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="offset-md-1 col-md-10" style="margin-top:30px;">
			<div class="card" style="background-color:transparent;">
                <div class="card-header" style="color:#000;background:rgba(255, 255, 255, .6)">
					<h1>Hello Admin</h1>
                </div>
				<div class="card-body" style="background: #ffffff;">
					@foreach ($questions->groupBy('round_id') as $key => $value)

					<ul>
					<p>Round {{ $key }} Questions</p>

					@foreach ($value as $question)

					@if ($question->active)
						<li>
							<a style="color: green;" href="{{ url('admin/round/'.$question->round_id.'/question/'.$question->id) }}"> {{ $question->text }}</a>
						</li>
					@else
						<li>
							<a style="color: black;"href="{{ url('admin/round/'.$question->round_id.'/question/'.$question->id) }}"> {{ $question->text }}</a>
						</li>
					@endif


					@endforeach

					</ul>

					@endforeach
				</div>
				<div class="card-footer">
					<a href="{{ route('game') }}" class="btn btn-light btn-sm" target="_blank">Open Game</a>
					<a href="{{ url('admin/players') }}" class="btn btn-light btn-sm">Players</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection