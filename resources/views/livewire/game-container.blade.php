<div class="container" wire:poll>
    <div class="row">
        <div class="col-sm-12 col-lg-9" style="margin-top:30px;">
            <div class="card" style="background-color:transparent;">
                <div class="card-header" style="color:#000;background:rgba(255, 255, 255, .6)">
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
                <div class="card-body" style="background: #ffffff;">
                    <div class="row text-center" style="margin:30px 0px 5px;">
                        <div class="col-md-12" style="padding:0px;">

                        @if (!$question)

                            <h3 class="loading">You're in the waiting room</h3>

                        @endif

                        @if ($answeredCurrentQuestion)

                            <h3><span class="badge badge-success">Question {{ $question->id }} answered!</h3>
                            <div class="loading">Waiting for other teams to answer</div>

                        @else

                            @if ($question)

                                <h1 style="margin-bottom:40px;">{{ $question->text }}</h1>

                                @if ($question->src)

                                    <div style="margin-bottom:20px;">
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
                                            <textarea name="answer" id="answer" rows="5" class="form-control{{$errors->has('answer') ? ' is-invalid' : ''}}" placeholder="Your answer goes here..." autofocus required>{{old('answer')}}</textarea>

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
                                            <select class="form-control{{ $errors->has('wager') ? ' is-invalid' : '' }}" id="wager" name="wager">
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
                                <div class="row" style="margin-top: 40px;">
                                    <div class="col-md-12">
                                        <i><svg class="bi bi-info-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                            <circle cx="8" cy="4.5" r="1"/>
                                          </svg> You can only use one wager option per round. Each round is three questions.</i>
                                    </div>
                                </div>

                            @endif

                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-3" style="margin-top:30px;">
            <div class="card" style="background-color: transparent;">
                <div class="card-header" style="background: rgba(255, 255, 255, .6)">
                    <p style="color: #000;margin-bottom:0px;">Teams / Score
                        <span class="float-right">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="color:black;text-decoration:underline;">
                                <i>{{ __('logout') }}</i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </span>
                    </p>
                </div>
                <div class="card-body" style="background-color: #ffffff;">

                @foreach ($teams as $team)

                    @if (count($team->answers) > 0)

                        @if ($team->answers->contains('question_id', $question->id))

                        <h4>
                            <span class="badge badge-success" style="padding:10px;">
                                {{ $team->name }}
                                <span class="badge badge-light">
                                    {{ number_format($team->answers->where('correct', TRUE)->sum('wager') + $team->answers->where('correct', TRUE)->sum('bonus')) }}
                                </span>
                            </span>
                        </h4>

                        @else

                        <h4>
                            <span class="badge badge-warning" style="padding:10px;">
                                {{ $team->name }}
                                <span class="badge badge-light">
                                    {{ number_format($team->answers->where('correct', TRUE)->sum('wager') + $team->answers->where('correct', TRUE)->sum('bonus')) }}
                                </span>
                            </span>
                        </h4>

                        @endif

                    @else

                    <h4>
                        <span class="badge badge-warning" style="padding:10px;">
                            {{ $team->name }}
                            <span class="badge badge-light">
                                {{ number_format($team->answers->where('correct', TRUE)->sum('wager') + $team->answers->where('correct', TRUE)->sum('bonus')) }}
                            </span>
                        </span>
                    </h4>

                    @endif

                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
