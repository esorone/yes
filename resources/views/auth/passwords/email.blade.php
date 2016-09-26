@extends('main')

@section('title', '| Wachtwoord vergeten')

@section('content')


    {{--// ziet er krom uit maar dit is het fomulier om een email te sturen om het ww te resetten
    de route is dan http://localhost:8000/password/reset . In de route staat
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm'); Dus GET het formulier
    Naam van deze view is de email maar je roept reset aan.....
    --}}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset wachtwoord</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing btn-block']) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>


@endsection