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
        $allAnsweredQuestions = NULL;
        $playerScore = 0;

        $round = Round::where('active', '=', TRUE)->find(1);

        if ($currentQuestion) {
            $answeredCurrentQuestion = Answer::where('user_id', '=', Auth::user()->id)
                ->where('question_id', '=', $currentQuestion->id)
                ->first();

            $allCorrectAnsweredQuestions = Answer::where('user_id', '=', Auth::user()->id)
                ->where('correct', '=', TRUE)
                ->get();

            $allAnsweredQuestions = Answer::where('user_id', '=', Auth::user()->id)
                ->where('round', '=', $round->count)
                ->get();

            foreach ($allCorrectAnsweredQuestions as $answer) {
                $playerScore += $answer->wager;
            };
        }

        $stage = Stage::where('active', '=', TRUE)->first();
        $wagers = Wager::where('active', '=', TRUE)->get();
        $teams = User::get();

        $teams = $teams->sortByDesc(function ($team) {
            return $team->answers->where('correct', TRUE)->sum('wager');
        });



        return view('livewire.game-container')
            ->withQuestion($currentQuestion)
            ->withAnsweredCurrentQuestion($answeredCurrentQuestion)
            ->withStage($stage)
            ->withRound($round)
            ->withPlayerScore($playerScore)
            ->withTeams($teams)
            ->withAllAnsweredQuestions($allAnsweredQuestions)
            ->withWagers($wagers);
    }
}
