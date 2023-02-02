<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $score=Score::all()->where('user_id',$id);
        return view('score.index',compact('score'));
    }

    public function leaderboard()
    {

        $score=Score::all();
        return view('score.leaderboard',compact('score'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(score $score)
    {
        return view('score/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(score $score)
    {
        //
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calScore(Request $request)
    {

        $questions = Question::all()->where('quiz_id', $request->quiz_id);

        $question = [];
        $totalMarks = 0;
        $i = 0;
        foreach ($questions as $q) {
            $totalMarks++;
            if(empty($request->field[$i]['answer']) == false) {
                $question[$i] = $q;
                $i++;
            }
        }
        
        $marks = 0;

        for ($i = 0; $i < count($question); $i++) {
            $originalAnswer = $question[$i]->correctAnswer;
            $userAnswer = $request->field[$i]['answer'];
            if ($originalAnswer == $userAnswer)
                $marks++;
        }


        $quiz = Quiz::all()->where('id', $request->quiz_id);

        $id = Auth::id();
        $sc = Score::all()->where('quiz_id', $request->quiz_id)->where('user_id', $id);


        $quiz_id = $request->quiz_id;
        $quiz_name = $quiz[$request->quiz_id - 1]->title;
        $user_id = $id;
        $score = $marks;
        $totalScore = $totalMarks;

        if ($sc->count() >= 1) {
            $sc=$sc->first();
            $sc->update([
                'user_id' => $id,
                'quiz_id' => $request->quiz_id,
                'score' => $marks,
                'totalScore' => $totalMarks
            ]);
        }
        else{   
            Score::create([
                'user_id' => $id,
                'quiz_id' => $request->quiz_id,
                'score' => $marks,
                'totalScore' => $totalMarks
            ]);
            
        }


        return View('score/show', compact('quiz_id', 'quiz_name', 'score', 'totalScore', 'user_id'));
    }
}
