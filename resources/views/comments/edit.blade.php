@extends('main')

@section('title', '| Wijzig reactie')

@section('content')

    <h1>Wijzig je reactie of smoes</h1>

        {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}


    <div class="col-md-8">
        {{ Form::label('name', 'Naam:') }}
        {{ Form::text('name', $comment->user->name, ['class' => 'form-control', 'disabled']) }}


        {{ Form::label('comment', 'reactie:', ['class' => 'form-spacing-top'])}}
        {{ Form::textarea('comment', null, ['class' => 'form-control'] )}}


        {{ Form::label('aanwezig', "Aanwezig :") }}

        {{--Hidden is een truukje om de lege waarde op te slaan--}}
        {!!  Form::hidden('aanwezig', '0', false) !!}
        {!! Form::checkbox('aanwezig', '1', true, array('data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee')) !!}

        {{ Form::submit('update reactie', ['class' => 'btn btn-block btn-success btn-h1-spacing']) }}

        <a href="{{ route('activiteit.single', $comment->post->id) }}" class="btn btn-default form-spacing-top"> Herstel en Terug </a> </a>


    </div>


        {{ Form::close() }}


@endsection