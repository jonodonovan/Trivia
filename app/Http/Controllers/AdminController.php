<?php

namespace App\Http\Controllers;

use App\User;
use App\Round;
use App\Question;
use App\Answer;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
		$users = User::get();
		$questions = Question::orderBy('round_id')->get();
		return view('admin.home')
					->withUsers($users)
					->withQuestions($questions);
	}

	public function players()
    {
		$users = User::get();
		return view('admin.players')->withUsers($users);
	}

	public function deletePlayer($slug)
    {
		$users = User::get();
		User::where('id', $slug)->firstOrFail()->delete();
		return redirect()->route('admin.players')->withUsers($users);
    }

    public function answers($round, $question)
    {
        $users = User::get();
        $round = Round::where('id', $round)->firstOrFail();
        $question = Question::where('id', $question)->firstOrFail();
        $answers = Answer::where('question_id', $question->id)->get();
        return view('admin.answers')->withUsers($users)->withRound($round)->withQuestion($question)->withAnswers($answers);
    }

    public function correctAnswers(Request $request, $slug)
    {
        $correctAnswers = $request->input('correctAnswer');

        foreach($correctAnswers as $correctAnswer => $value) {
            $answer = Answer::where('question_id', $slug)->where('user_id', $correctAnswer)->firstOrFail();
            $answer->correct = TRUE;
            $answer->save();
        }

        return redirect()->route('admin.home');
    }
}
