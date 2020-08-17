<div class="container" wire:poll>
    <div class="row">
        <div class="col-sm-12 col-lg-9 game-column">
            <div class="card">
                <div class="card-header">
                    <span class="float-left">
                        Your Score: {{ number_format($playerScore) }}
                    </span>
                    <span class="float-right">

                    @if ($question)

                        <span>Category: {{ $question->category->name }}</span><br>
                        <span>Round: {{ $round->count }} | Question: {{ $question->id }}</span>

                    @endif

                    </span>
                </div>
                <div class="card-body">
                    <div class="row text-center game-body-row">
                        <div class="col-md-12 game-body-column">

                        @if (!$question)

                            <h3 class="loading">You're in the waiting room</h3>

                        @endif

                        @if ($answeredCurrentQuestion)

                            <h3><span class="badge badge-success">Question {{ $question->id }} answered!</h3>
                            <div class="loading">Waiting for other players to answer</div>

                        @else

                            @if ($question)

                                <h1 class="game-question-h1">{{ $question->text }}</h1>

                                @if ($question->src)

                                    <div class="game-question-image">
                                        <img src="{{ $question->src }}" class="img-fluid" alt="{{ $question->text }}">
                                    </div>

                                @endif

                                <form method="POST" action="{{ route('answer.store') }}">
                                    @csrf
                                    <input type="hidden" name="round" value="{{ $round->count }}">
                                    <input type="hidden" name="question" value="{{ $question->id }}">
                                    <input type="hidden" name="type" value="{{ $question->type }}">

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <textarea name="answer" id="answer" rows="5" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" placeholder="Your answer goes here..." autofocus required>{{ old('answer') }}</textarea>

                                            @if ($errors->has('answer'))

                                                <span class="invalid-feedback">
                                                    <strong>{{$errors->first('answer')}}</strong>
                                                </span>

                                            @endif

                                        </div>
                                    </div>

                                    @if ($question->type == 1)

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select class="form-control{{ $errors->has('wager') ? ' is-invalid' : '' }}" id="wager" name="wager" required>
                                                <option value="">Your wager</option>

                                                @foreach ($wagers as $wager)

                                                    @if (!$allAnsweredQuestions->contains('wager', $wager->value))

                                                    <option value="{{$wager->value}}">{{$wager->value}}</option>

                                                    @endif

                                                @endforeach

                                            </select>

                                            @if ($errors->has('wager'))

                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('wager') }}</strong>
                                                </span>

                                            @endif

                                        </div>
                                    </div>

                                    @elseif ($question->type == 2)

                                    @else

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="wager">Your wager (0-15)</label>
                                            <input type="text" class="form-control{{ $errors->has('wager') ? ' is-invalid' : '' }}" name="wager" id="wager" value="{{ old('wager') }}" placeholder="0-15" required>

                                            @if ($errors->has('wager'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('wager') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                    </div>

                                    @endif

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit Answer') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            @endif

                        @endif

                        </div>
                    </div>
				</div>
				<div class="card-footer">
					<i><svg class="bi bi-info-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
						<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
						<circle cx="8" cy="4.5" r="1"/>
					  </svg> You can only use one wager option per round. Each round is three questions.</i>
				</div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-3 game-score-column">
            <div class="card game-score-card">
                <div class="card-header game-score-card-header">
                    <p>Player / Score</p>
                </div>
                <div class="card-body game-score-card-body">

                @foreach ($teams as $team)

                    @if (count($team->answers) > 0)

                        @if ($team->answers->contains('question_id', $question->id))

                        <h4>
                            <span class="badge badge-success">
                                {{ $team->name }}
                                <span class="badge badge-light">
                                    {{ number_format($team->answers->where('correct', TRUE)->sum('wager') + $team->answers->where('correct', TRUE)->sum('bonus')) }}
                                </span>
                            </span>
                        </h4>

                        @else

                        <h4>
                            <span class="badge badge-warning">
                                {{ $team->name }}
                                <span class="badge badge-light">
                                    {{ number_format($team->answers->where('correct', TRUE)->sum('wager') + $team->answers->where('correct', TRUE)->sum('bonus')) }}
                                </span>
                            </span>
                        </h4>

                        @endif

                    @else

                    <h4>
                        <span class="badge badge-warning">
                            {{ $team->name }}
                            <span class="badge badge-light">
                                {{ number_format($team->answers->where('correct', TRUE)->sum('wager') + $team->answers->where('correct', TRUE)->sum('bonus')) }}
                            </span>
                        </span>
                    </h4>

                    @endif

                @endforeach

				</div>
				<div class="card-footer">
					@if (Auth::user()->is_admin)
						<a href="{{ url('admin/home') }}"><i>admin</a> |</i>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i>{{ __('logout') }}</i>
						</a>
					@else
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i>{{ __('logout') }}</i>
						</a>
					@endif

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@if($errors->any())
    {{ implode('', $errors->all('message')) }}
@endif