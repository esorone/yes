@extends('main')

@section('title', '| Profiel')

@section('content')


    <div class="row">
        <div class="col-md-8">
            {!! Form::open(['route'=>'profile.edit', 'files' => true, 'method' => 'POST']) !!}
            {{ Form::label('avatar', 'Upload profielfoto') }}
            {{ Form::file('avatar') }}

            {{ Form::submit('verstuur',['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
            {!! Form::close() !!}

        </div>
        <div class="col-md-4">
            {{--asset geeft de publieke url--}}
            <img class="img_size" src="{{ asset('images/'. $user->avatar) }}" alt="">
        </div>
    </div>
@endsection