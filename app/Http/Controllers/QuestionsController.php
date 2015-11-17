<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use App\Category;
use App\Learnedword;
use Config;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $learnedValue = $request->input('learned_value');
        $userId = \Auth::user()->id;
        $learnedquestionsIdCollection = Learnedword::whereCategoryId($categoryId)->whereUserId($userId)->lists('question_id');
        if ($learnedValue == config('custom.all_questions')) {
            $questions = Question::whereCategoryId($categoryId)->get();
        } elseif ($learnedValue == config('custom.learned')) {
            $questions = Question::whereIn('id', $learnedquestionsIdCollection)->get();
        } else {
            $questions = Question::whereCategoryId($categoryId)->whereNotIn('id', $learnedquestionsIdCollection)->get();
        }
        $questionsIdCollection = $questions->lists('id');
        $answers = Answer::whereIn('question_id', $questionsIdCollection)->whereIsCorrect(1)->get();
        $categories = Category::lists('category_name', 'id');
        return view('questions/index', compact('questions', 'answers', 'categories'));
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
        //
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
