<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz=Quiz::all();
        return View('quiz/index',compact('quiz'));
    }

    public function userIndex()
    {
        $quiz=Quiz::all();
        return View('quiz/userIndex',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'image'=>'required'
        ]);

        $uuid = Str::uuid()->toString();
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file_name = $uuid . $file_name;
        $file->move('uploads', $file_name);

        $data['image'] = $file_name;
        
        
        $id = Quiz::create($data);
        $id = $id->id;
        
        return redirect('create-question/'.$id);
        // return view('question/create',compact('id'));   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $question = Question::all()->where('quiz_id', $quiz->id);
        return view('quiz/show',compact('question','quiz'));
    }

    public function userShow(Quiz $quiz)
    {
        $question = Question::all()->where('quiz_id', $quiz->id);
        return view('quiz/userShow',compact('question','quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $question = Question::all()->where('quiz_id', $quiz->id);
        return view('quiz/edit',compact('question','quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        // $question = Question::all()->where('quiz_id', $quiz->id);
        // foreach($question as $q){
        //     Question::destroy($q);
        // }
        $quiz->delete();
        return redirect('index-quiz');

    }
}
