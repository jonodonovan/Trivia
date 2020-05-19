<div class="container" wire:poll>
    <div class="row">
        <div class="col-sm-12 col-lg-9" style="margin-top:30px;">
            <div class="card">
                <div class="card-header">
                    <span class="float-left">
                        Your Score: {{ $playerScore }}
                    </span>
                    <span class="float-right">

                    @if ($question)

                        Round: {{ $round->count }} | Question: {{ $question->id }}

                    @endif

                    </span>
                </div>
                <div class="card-body">
                    <div class="row text-center" style="margin:30px 0px;">
                        <div class="col-md-12">

                        @if (!$question)

                        <h3 class="loading">You're in the waiting room</h3>

                        @endif

                        @if ($answeredCurrentQuestion)

                        <h3><span class="badge badge-success">Question {{ $question->id }} answered!</h3>
                        <div class="loading">Waiting for other teams to answer</div>

                        @else

                            @if ($question)

                                <h2>{{ $question->text }}</h2>

                                <form method="POST" action="{{ route('answer.store') }}">
                                    @csrf
                                    <input type="hidden" name="stage" value="{{ $stage->id }}">
                                    <input type="hidden" name="round" value="{{ $round->count }}">
                                    <input type="hidden" name="question" value="{{ $question->id }}">

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

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <select class="form-control{{ $errors->has('wager') ? ' is-invalid' : '' }}" id="wager" name="wager">
                                                <option value="">Select Wager</option>

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
            </div>
        </div>

        <div class="col-sm-12 col-lg-3" style="margin-top:30px;">
            <div class="card">
                <div class="card-header">Teams</div>
                <div class="card-body">

                @foreach ($teams as $team)

                    @if (count($team->answers) > 0)

                        @if ($team->answers->contains('question_id', $question->id))

                        <h4><span class="badge badge-success" style="padding:10px;">{{ $team->name }} <span class="badge badge-light">{{ $team->answers->where('correct', TRUE)->sum('wager') }}</span></span></h4>

                        @else

                        <h4><span class="badge badge-warning" style="padding:10px;">{{ $team->name }} <span class="badge badge-light">{{ $team->answers->where('correct', TRUE)->sum('wager') }}</span></span></h4>

                        @endif

                    @else

                    <h4><span class="badge badge-warning" style="padding:10px;">{{ $team->name }} <span class="badge badge-light">{{ $team->answers->where('correct', TRUE)->sum('wager') }}</span></span></h4>

                    @endif

                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
