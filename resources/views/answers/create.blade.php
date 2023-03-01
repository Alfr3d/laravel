<div class="card mb-3" id="createAnswerBlock" style="display: none; text-align: start;">
    <div class="card-header bg-transparent"><h3>Create New Answer</h3></div>

    <div class="bg-white" style="padding: 20px; border-radius: 5px;">
        <form method="post" action="{{route('answers.store', $question->id)}}">
            @csrf
            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Description"></textarea>
            </div>

            <div style="text-align: end;">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
