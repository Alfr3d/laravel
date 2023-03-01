@extends('layouts.app')

@section('title', 'Question -' . $question->title)

@section('content')
    <div class="card mb-3" style="text-align: start;">
        <div class="card-header bg-transparent"><h3>{{ $question->title }}</h3></div>
        <div class="card-header d-flex justify-content-between" >
            <div>
                Author: {{ $question->user->nickname }}
            </div>
            <div>
                <span class="mr-5 date-text">Asked: {{$question->created_at}}</span>
                <span class="date-text">Updated: {{$question->updated_at}}</span>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{ $question->description }}
            </p>
        </div>
        <div class="card-footer bg-transparent d-flex justify-content-end">
            <div class="m-1">
                <button type="button" id="addAnswer" class="btn btn-outline-primary">Answer</button>
            </div>
            @if((auth()->user()->id == $question->user_id))
                <div class="m-1">
                    <a href="/questions/{{ $question->id }}/edit" type="button" class="btn btn-outline-info">Edit</a>
                </div>
            @endif
        </div>
    </div>

    @include('answers.create')
    @include('answers.answers')
@endsection
