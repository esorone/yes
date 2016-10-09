
{{--Dit is de activiteiten pagina die de users kunnen zien. Via menu activiteiten--}}
@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")
@section('content')
    <div class="post_bg">
    @if(Auth::check())

            <div class="row">
                <div class="col-md-12"><h1>Titel: {{ $post->title }}</h1><br></div>
                <div class="col-md-6"><h3>Bijzonderheden: <br> {{ $post->body }}</h3> </div>
                <div class="col-md-6 text-right"><span class="glyphicon glyphicon-comment" style="font-size: 2em;"></span> Aantal reacties of smoezen:  {{ $post->comments()->count() }}<br>
                Aantal aanwezig: {{ $aantallen }}</div>
            </div> <!-- Einde row -->
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>Reacties:</h2>
                </div>
                @foreach($post->comments->sortByDesc('updated_at') as $comment)

                <div class="col-md-12 col-sm-12">
                    <div class="col-md-2 col-sm-2 thumbnail">
                        <img class=" hidden-xs img-responsive user-photo" src="{{ asset('images/'. $comment->user->avatar) }}" alt="avatar" />
                        <figcaption class="text-center">{{ $comment->user->name }}</figcaption>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default box1">
                            <div class="panel-heading">
                                <span class="text-muted">Laatste Update: {{ $comment->updated_at }}</span>
                                <div class="text-right">
                                    @if ($comment->aanwezig === 1)
                                        <span class="glyphicon glyphicon-ok"></span>
                                    @else <span class="glyphicon glyphicon-remove"></span>
                                    @endif</div>
                            </div>
                            <div class="panel-body">
                                {{ $comment->comment }}
                                <div class="row">
                                    <div class="text-right col-md-offset-9"><a href="{{ route('comments.edit', $comment->id) }}"
                                                                               class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></div>
                                </div>

                            </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                    </div><!-- col-md-6 -->
                </div><!-- col-md-12 -->

                @endforeach
                     <div class="row">
                        <div class="col-md-12 form-spacing-top">
                            {{ Form::open(['route' => ['comments.store', $post->id], 'Method' => 'POST' ]) }}
                            {{ Form::label('aanwezig', "Aanwezig :") }}

                            {{--Hidden is een truukje om de lege waarde op te slaan--}}
                            {!! Form::hidden('aanwezig', '1', false) !!}
                            {!! Form::checkbox('aanwezig', '1', true, array('data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee')) !!}
                        </div>
                    </div>
                <br><hr>
                <div class="col-md-12">
                    {{ Form::label('comment', "Opmerking :") }}
                    {{ Form::textarea('comment', 'Geef je reactie', ['class' => 'form-control']) }}
                    {{ Form::submit('Voeg toe', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
                    {{ Form::close() }}
                </div>









            </div><!-- Einde row -->

    </div> <!-- einde post_bg -->

    @endif
@endsection