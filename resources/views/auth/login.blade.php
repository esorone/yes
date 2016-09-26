@extends('main')

@section('title', '| Inloggen')
@section('stylesheets')
    {!! Html::style('css/inlog.css') !!}
@endsection
<div class="remove_bg">
@section('content')

    <div class="row">
        <div class="col-md-12 form-spacing-top text-center">

            <img src="{{ asset('images/logo_goud_zonder_tekst.png') }}" alt="logo">
            <h1>Inloggen 35+1 </h1>
            <hr>
            </div>
        <div class="col-md-12 text-center">
            <p class="label-danger" style="font-size: 2em; color: #fff;">LET OP.. App is nog een beta en moet verder verfijnd worden</p>
        </div>

        <div class=" text-forms col-md-8 col-md-offset-2 form-spacing-top box1">
            <div class="text-form-grid">
            {!! Form::open() !!}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Wachtwoord:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
                <hr>
                {{ Form::checkbox('remember') }} {{ Form::label('remember', 'Onthouden') }}
                <br>
                {{ Form::submit('Login', ['class' => 'btn btn-success btn-block']) }}
                <a href="{{ url('password/reset') }}">Wachtwoord vergeten!</a>

            {!! Form::close() !!}
            </div>
        </div>

    </div>
    <div class="col-md-8 col-md-offset-2 footer_tekst"> <p>Login in de aanwezigheidsApp van het 35+1 elftal van EFCPW.
            Vraag aan de beheerder om een inlogcode</p> <br>
    </div>







@endsection
</div>