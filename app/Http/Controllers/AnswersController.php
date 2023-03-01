<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $questionId)
    {
        $answer = new Answer();
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $questionId;
        $answer->description = $request->description;
        $answer->save();

        return redirect()->intended(route('questions.show', $questionId));
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answers): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answers): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $answer = Answer::findOrFail($id);
        $question = Question::findOrFail($answer->question_id);
        $questionId = $question->id;

        if (Auth::user()->id !== $answer->user_id) {
            return abort(404);
        }

        $answer->description = $request->description;
        $answer->save();

        return redirect()->intended(route('questions.show', $questionId));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $answer = Answer::findOrFail($id);
        $question = Question::findOrFail($answer->question_id);
        $questionId = $question->id;

        if (
            Auth::user()->id !== $answer->user_id &&
            Auth::user()->id !== $question->user_id
        ) {
            return abort(404);
        }

        Answer::destroy($answer->id);

        return redirect()->intended(route('questions.show', $questionId));
    }
}
