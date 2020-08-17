@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin-top:30px;">
			<div class="card" style="background-color:transparent;">
                <div class="card-header" style="color:#000;background:rgba(255, 255, 255, .6)">
					<p>{{ $round->active }} | {{ $question->id }} | {{ $answers->count() }}</p>
                </div>
				<div class="card-body" style="background: #ffffff;">
					<form method="POST" action="{{route('correctAnswers', $question)}}">
						{{method_field('PATCH')}}
						@csrf
					<table class="table table-bordered" style="margin:40px 0px;">
						<thead>
						   <tr>
							  <th style="width:15%">Player</th>
							  <th>Answer</th>
							  <th style="width:10%">Status</th>
						   </tr>
						</thead>
						<tbody>

							@foreach($users as $user)

								<tr>
									<td>{{ $user->name }}</td>

									@foreach ($answers as $answer)

										@if ($answer->user_id == $user->id)

										<td>{{ $answer->answer }}</td>
										<td>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" name="correctAnswer[{{ $answer->user_id }}]">
											</div>
										</td>

										@else

										<td>Waiting</td>
										<td>Waiting</td>

										@endif

									@endforeach

							  </tr>

						   @endforeach

						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<a href="{{ route('admin.home') }}" class="btn btn-light btn-sm">Cancel</a>
					<button type="submit" class="btn btn-primary btn-sm">Save</button>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
@endsection