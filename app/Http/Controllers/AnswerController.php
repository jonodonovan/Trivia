<?php

namespace App\Http\Controllers;

use App\Answer;
use Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        if ($request->type == 1) {

            $this->validate($request, array(
                'stage' => 'required',
                'round' => 'required',
                'question' => 'required',
                'answer' => 'required',
                'wager' => 'required',
            ));

            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->stage_id = $request->stage;
            $answer->round = $request->round;
            $answer->question_id = $request->question;
            $answer->answer = $request->answer;
            $answer->wager = $request->wager;
            $answer->save();

        } elseif ($request->type == 2) {

            $this->validate($request, array(
                'stage' => 'required',
                'round' => 'required',
                'question' => 'required',
                'answer' => 'required',
            ));

            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->stage_id = $request->stage;
            $answer->round = $request->round;
            $answer->question_id = $request->question;
            $answer->answer = $request->answer;
            $answer->wager = '0';
            $answer->save();

        } else {

            $this->validate($request, array(
                'stage' => 'required',
                'round' => 'required',
                'question' => 'required',
                'answer' => 'required',
                'wager' => 'required|integer|between:0,15',
            ));

            $answer = new Answer;
            $answer->user_id = Auth::user()->id;
            $answer->stage_id = $request->stage;
            $answer->round = $request->round;
            $answer->question_id = $request->question;
            $answer->answer = $request->answer;
            $answer->wager = $request->wager;
            $answer->save();
        }

        return redirect()->route('home');
    }
}
