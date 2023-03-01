@extends('layouts.app')

@section('title', 'Question Edit')

@section('content')
    <div class="bg-white" style="padding: 20px; border-radius: 5px;">
        <form method="post" action="{{ route('questions.update', $question->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Question Title</label>
                <input type="text" value="{{ $question->title }}" name="title" class="form-control" id="questionTitle" aria-describedby="emailHelp" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control" placeholder="Description">{{ $question->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
