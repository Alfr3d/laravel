@extends('layouts.app')

@section('title', 'Question Create')

@section('content')
    <div class="bg-white" style="padding: 20px; border-radius: 5px;">
        <form method="post" action="{{ route('questions.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Question Title</label>
                <input type="text" name="title" class="form-control" id="questionTitle" aria-describedby="emailHelp" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
