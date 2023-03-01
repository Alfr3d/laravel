@foreach($question->answers as $answer)
    <div class="card mb-3" style="text-align: start; margin: 15px">
        <div class="card-header d-flex justify-content-between" style="background-color: rgba(135, 206, 235, 0.3);">
            <div>{{ $answer->user->nickname }}</div>
            <div>
                <span class="mr-5 date-text">Asked: {{ $answer->created_at }}</span>
                <span class="date-text">Updated: {{ $answer->updated_at }}</span>
            </div>
        </div>
        <div class="card-header d-flex justify-content-between" >
            <div class="card m-auto" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p id="answerDescription-{{$answer->id}}" class="card-text">{{ $answer->description }}</p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end" style="text-align: end; padding: 5px 20px 5px 15px;">
            <div class="m-1">
                <button class="btn btn-outline-primary">Like</button>
            </div>
            @if(auth()->user()->id == $answer->user_id)
                <div class="m-1">
                    <button value="{{$answer->id}}" class="btn btn-outline-warning editAnswer">Edit</button>
                </div>
            @endif
            @if((auth()->user()->id == $answer->user_id) || (auth()->user()->id == $question->user_id))
                <div class="m-1">
                    <form method="post" action="{{ route('answers.destroy', $answer->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endforeach
