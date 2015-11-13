<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Lesson;
use App\Lessonbase;
use App\Question;
use App\User;
use App\Answer;
use DB;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (\Auth::check()) {
            $selectedId = 0;
            $alreadyLearnedId = 0;
            $categoryId = $request->input('id');
            $userId = \Auth::user()->id;
            $questions = Category::find($categoryId)->questions;
            foreach ($questions as $index => $question) {
                $lessonbase = Lessonbase::where('question_id', '=', $question->id)->first();
                $lesson = Lesson::where('lesson_id', '=' , $lessonbase->lesson_id)->where('user_id', '=', $userId)->first();
                if (!$lesson) {
                    $selectedId = $lessonbase->lesson_id;
                    break;
                }
                if ($lesson->score == 0) {
                    $selectedId = $lesson->lesson_id;
                    break;
                }
                else {
                    $alreadyLearnedId = $lesson->lesson_id;
                }
            }
            if ($selectedId == 0) {
                $selectedId = $alreadyLearnedId + 1;
            }
            $questionCollection = DB::table('lessonbase')->where('lesson_id', '=', $selectedId)->lists('question_id');
            $questions = Question::wherein('id', $questionCollection)->get();
            $answers = Answer::wherein('question_id', $questionCollection)->get();
            return view('lessons', compact('selectedId', 'questions', 'answers'));
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
