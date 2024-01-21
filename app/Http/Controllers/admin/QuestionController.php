<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['questions'] = Question::all();
        return view('admin.questions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        return view('admin.questions.add', $data);
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
        $question = new Question();

        $question->title = $request->title;
        $question->status = $request->status;
        $question->answer = $request->answer;
        $question->question = htmlentities($request->question, ENT_NOQUOTES, 'UTF-8');
        $question->tag = $request->tag;

        $question->save();

        return redirect()->route('questions.edit', $question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {        
        $test_variants = [
            "1111",
            "2222",
            "3333",
            "4444"
        ];
        $question['variants'] = json_decode($question->variants) ?? $test_variants;
        return view('admin.questions.edit', [
            'question' => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        
        $question->title = $request->title;
        $variants = json_encode($request->variants);
        $question->variants = $variants;
        
        $correct_ids_array = ['1'];
        $correct_ids = json_encode($correct_ids_array);
        $question->correct_ids = $correct_ids;

        $question->save();

        return redirect()->back()->withSuccess('Question has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()->withSuccess('Article has been delete!');
    }
}
