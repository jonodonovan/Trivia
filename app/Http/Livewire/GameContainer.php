<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Question;
use App\Answer;
use App\Stage;
use App\Round;
use App\Wager;
use App\User;
use Auth;

class GameContainer extends Component
{
    public function render()
    {
        $currentQuestion = Question::where('active', '=', TRUE)->first();

        $answeredCurrentQuestion = NULL;
        $playerScore = '0';

        if ($currentQuestion) {
            $answeredCurrentQuestion = Answer::where('user_id', '=', Auth::user()->id)
                ->where('question_id', '=', $currentQuestion->id)
                ->first();
        }

        $allAnsweredQuestions = Answer::where('user_id', '=', Auth::user()->id)
            ->where('correct', '=', TRUE)
            ->get();

        $playerScore = 0;
            foreach ($allAnsweredQuestions as $answer) {
            $playerScore += $answer->wager;
        };

        $stage = Stage::where('active', '=', TRUE)->find(1);
        $round = Round::where('active', '=', TRUE)->find(1);

        $teams = User::get();
        // $teams2 = User::with(['answers' => function ($q) {
        //     $q->where('correct', TRUE)
        //     ->orderByRaw('wager', 'desc');
        // }])->get();

        return view('livewire.game-container')
            ->withQuestion($currentQuestion)
            ->withAnsweredCurrentQuestion($answeredCurrentQuestion)
            ->withStage($stage)
            ->withRound($round)
            ->withPlayerScore($playerScore)
            ->withTeams($teams);
    }
}
