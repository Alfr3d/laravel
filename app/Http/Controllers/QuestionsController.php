<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('questions.questions', ['questions' => Question::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->title = $request->title;
        $question->description = $request->description;

        $question->save();

        return redirect()->intended('/questions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return view('questions.show', [
            'question' => Question::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $question = Question::findOrFail($id);

        if ($question->user_id != Auth::user()->id) {
            return abort(404);
        }

        return view('questions.edit', [
            'question' => Question::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $question = Question::findOrFail($id);

        if ($question->user_id != Auth::user()->id) {
            return abort(404);
        }

        $question->title = $request->title;
        $question->description = $request->description;
        $question->save();

        return redirect()->intended('/questions/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $questions): RedirectResponse
    {
        //
    }
}
