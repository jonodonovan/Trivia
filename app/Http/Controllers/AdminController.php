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
		$questions = Question::orderBy('round')->get();
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
		$question = Question::where('id', $question)->firstOrFail();
        $answers = Answer::where('question_id', $question->id)->get();
        return view('admin.answers')->withUsers($users)->withQuestion($question)->withAnswers($answers);
    }

    public function correctAnswers(Request $request, $slug)
    {
        $correctAnswers = $request->input('correctAnswer');

        foreach($correctAnswers as $correctAnswer => $value) {
            $answer = Answer::where('question_id', $slug)->where('user_id', $correctAnswer)->firstOrFail();

			if ($value == '0') {
				$answer->correct = FALSE;
			} else {
				$answer->correct = TRUE;
			}

            $answer->save();
        }

        return redirect()->route('admin.home');
	}

	public function activateQuestion(Request $request)
    {
        $this->validate($request, array(
            'question'	=> ['required', 'exists:questions,id'],
		));

		// find current active question and mark not active
		$currentquestion = Question::where('active', TRUE)->first();

		if ($currentquestion) {
			$currentquestion->active = FALSE;
			$currentquestion->save();
		}

		// find this question
		$question = Question::where('id', $request->question)->firstOrFail();
		$question->active = TRUE;
		$question->save();

        return redirect()->route('admin.home');
    }
}
