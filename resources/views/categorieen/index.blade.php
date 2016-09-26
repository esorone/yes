@extends('main')

@section('title', '| alle categorieen')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Aangemaakte Categorieen</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Naam: </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorieen as $categorie)
                    <tr>
                        <th>{{ $categorie->id }}</th>
                        <th>{{ $categorie->name }}</th>
                        <th>{!! Form::open(['route' => ['categorieen.destroy', $categorie->id],'method' => 'DELETE']) !!}
                            {{--{!! Form::submit('Delete', ['class' => 'glyphicon glyphicon-trash']) !!}--}}
                            {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class'=>'btn btn-default', 'type'=>'submit')) }}
                            {!! Form::close() !!}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- einde col-md-8 -->
        <div class="col-md-3">
            @if(Session::has('flash_message'))
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
            @endif
            @if(Session::has('flash_message_delete'))
                <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>
            @endif
            <div class="well">
                {!! Form::open(['route'=>'categorieen.store', 'method' => 'POST']) !!}
                    <h2>Nieuwe categorie</h2>
                    {{ Form::label('Name', 'Naam:' ) }}
                    {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '225', 'minlength' => '5'))}}
                    {{ Form::submit('verstuur',['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
                {!! Form::close() !!}

            </div>

        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection