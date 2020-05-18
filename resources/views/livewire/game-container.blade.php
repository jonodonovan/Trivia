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
                        Question: {{ $question->id }}
                    @endif
                    </span>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        {{-- <div class="col-md-4">
                        @if ($stage)
                            Stage: {{ $stage->name }}
                        @endif
                        </div>
                        <div class="col-md-4">
                        @if ($round)
                            Round: {{ $round->count }}
                        @endif
                        </div> --}}
                        <div class="col-md-4">

                        </div>
                    </div>


                    <div class="row text-center" style="margin:30px 0px;">
                        <div class="col-md-12">

                        @if (!$question)

                        <h3>You're in the waiting room.</h3>

                        @endif

                        @if ($answeredCurrentQuestion)

                        <h3><span class="badge badge-success">Done!</span> Question {{ $question->id }} answered!</h3>

                        @else

                            @if ($question)
                                <h2>{{ $question->text }}</h2>

                                <form method="POST" action="{{ route('answer.store') }}">
                                    @csrf
                                    <input type="hidden" name="stage" value="{{ $stage->id }}">
                                    <input type="hidden" name="round" value="{{ $round->id }}">
                                    <input type="hidden" name="question" value="{{ $question->id }}">

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <textarea name="answer" id="answer" rows="5" class="form-control{{$errors->has('answer') ? ' is-invalid' : ''}}" placeholder="Your answer goes here..." autofocus>{{old('answer')}}</textarea>
                                            @if ($errors->has('answer'))
                                                <span class="invalid-feedback">
                                                    <strong>{{$errors->first('answer')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input class="form-control @error('wager') is-invalid @enderror" name="wager" value="{{ old('wager') }}" required placeholder="Your wager goes here...">

                                            @error('wager')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
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
                <div class="card-header">Teams - Score</div>
                <div class="card-body">

                @foreach ($teams as $team)

                    @if (count($team->answers) > 0)

                        @if ($team->answers->contains('question_id', $question->id))

                        <h4><span class="badge badge-success" style="padding:10px;">{{ $team->name }} - {{ $team->answers->where('correct', TRUE)->sum('wager') }}</span></h4>

                        @else

                        <h4><span class="badge badge-warning" style="padding:10px;">{{ $team->name }} - {{ $team->answers->where('correct', TRUE)->sum('wager') }}</span></h4>

                        @endif

                    @else

                    <h4><span class="badge badge-warning" style="padding:10px;">{{ $team->name }} <span class="badge badge-light">{{ $team->answers->where('correct', TRUE)->sum('wager') }}</span></span></h4>

                    @endif

                    {{-- @foreach ($team->answers as $answer)

                        @if ($answer->question_id === $question->id && $answer->question_id == $team->id)
                            <p style="color:green;">{{ $team->name }}</p>
                        @else

                        @endif

                    @endforeach --}}

                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
