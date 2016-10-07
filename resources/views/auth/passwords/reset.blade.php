@extends('main')

@section('title', '| Wachtwoord resetten')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default form-spacing-top">
                <div class="panel-heading">Reset wachtwoord</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

                    {!! Form::hidden('token', $token) !!}

                    {!! Form::label('email', 'E-mailadres:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}

                    {{ Form::label('password', 'Nieuw Wachtwoord:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ Form::label('password_confirmation', 'Herhaal Wachtwoord:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                    {!! Form::submit('verstuur wachtwoord', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection