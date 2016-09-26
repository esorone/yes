@extends('main')

@section('title', '| Registreer')
@section('stylesheets')
    {!! Html::style('css/inlog.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 form-spacing-top logo_center">

            <img src="{{ asset('images/logo_goud_zonder_tekst.png') }}" alt="logo">
            <h1> Registreer een gebruiker </h1>
            <hr>
        </div>
        <div class="col-md-6 col-md-offset-3 form-spacing-top">
            {!! Form::open() !!}"

            {{ Form::label('name', 'Naam:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}

            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}

            {{ Form::label('password', 'Wachtwoord:') }}'
            {{ Form::password('password', ['class' => 'form-control']) }}
            {{ Form::label('password_confirmation', 'Herhaal Wachtwoord:') }}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            {{ Form::checkbox('is_admin', null, ['class' => 'form-spacing-top']) }} {{ Form::label('is_admin', 'Beheerder') }}
            <hr>
            {{ Form::checkbox('remember') }} {{ Form::label('remember', 'Onthouden') }}
            <br>
            {{ Form::submit('Registreer', ['class' => 'btn btn-success btn-block']) }}

            {!! Form::close() !!}
        </div>
    </div>
@endsection