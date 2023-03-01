@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ url('/questions/create') }}" type="button" class="btn btn-outline-success">Ask Question</a>
    </div>
    @foreach($questions as $question)
        <div class="row question-list-container">
                <div class="card m-auto col-8 p-0">
                    <div class="card-header">
                        <h5 class="card-title">{{ $question->title }}</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <p class="card-text" style="text-align: start;">{{ \Illuminate\Support\Str::of($question->description)->words(30, '...')}}</p>
                        </div>
                        <div class="mt-3" style="text-align: right;x`">
                            <a href="{{ url('/questions/' . $question->id) }}" class="btn btn-outline-primary">More Info</a>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endsection
