@extends('main')
@section('title', '| Reactie verwijderen')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Weet je zeker dat je je reactie wilt verwijderen?</h1>
            <p>
                <strong>Naam:</strong> {{ $comment->user->name}}<br>
                <strong>Reactie:</strong> {{ $comment->comment }}<br>
                <strong>Aanwezig:</strong>
                @if ($comment->aanwezig === 1)
                    <span class="glyphicon glyphicon-ok">
                    @else <span class="glyphicon glyphicon-remove">
                @endif
            </p>
            {!! Form::open(['route' => ['comments.destroy', $comment->id],
                                                'method' => 'delete']) !!}
            {{ Form::submit('Ja verwijder maar', ['class' => 'btn btn-lg btn-block btn-danger']) }}
            {{ Form::close() }}






        </div>
    </div>

@endsection