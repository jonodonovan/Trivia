<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        if ($request->type == 1) {

            $this->validate($request, array(
                'round' => 'required',
                'question' => 'required',
                'answer' => 'required',
                'wager' => 'required',
            ));

            $currentQuestion = Question::where('active', '=', TRUE)->first();
            $checkAnswers = Answer::where('question_id', '=', $currentQuestion->id)->count();

            $answer = new Answer;

            switch ($checkAnswers) {
                case 0:
                    $answer->bonus = 3;
                break;
                case 1:
                    $answer->bonus = 2;
                break;
                case 2:
                    $answer->bonus = 1;
                break;
                default:
                    $answer->bonus = 0;
            }

            $answer->user_id = Auth::user()->id;
            $answer->round = $request->round;
            $answer->question_id = $request->question;
            $answer->answer = $request->answer;
            $answer->wager = $request->wager;
            $answer->save();

        } elseif ($request->type == 2) {

            $this->validate($request, array(
                'round' => 'required',
                'question' => 'required',
                'answer' => 'required',
            ));

            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->round = $request->round;
            $answer->question_id = $request->question;
            $answer->answer = $request->answer;
            $answer->wager = '0';
            $answer->save();

        } else {

            $this->validate($request, array(
                'round' => 'required',
                'question' => 'required',
                'answer' => 'required',
                'wager' => 'required|integer|between:0,15',
            ));

            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->round = $request->round;
            $answer->question_id = $request->question;
            $answer->answer = $request->answer;
            $answer->wager = $request->wager;
            $answer->save();
        }

        return redirect()->route('home');
    }
}
