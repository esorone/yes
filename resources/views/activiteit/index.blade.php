{{--Dit is de lijst van activiteiten pagina die de users kunnen zien. Via menu activiteiten--}}

@extends('main')

@section('title', '| Activiteiten')

@section('content')
    <div class="post_bg">
        @if(Auth::check())

            <div class="row">
                <div class="text-center col-md-8 col-md-offset-2">
                    <h1>Activiteiten overzicht</h1>
                </div>
            </div>
            @foreach($posts as  $post)
                <div class="row marge_bottom">

                    <div class="col-md-3 ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 clndr-top">
                                <h3> {{ date('l', strtotime($post->date)) }}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 events">
                                <h3> {{ date('j M, Y', strtotime($post->date)) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 box1">
                        <div class="col-md-12 well">
                            <h3> Titel: {{ $post->title }} </h3> <br>
                            <h5> Categorie: {{ $post->categorie->name }}</h5><br>
                            {{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12 btn_bottom">
                            <a href="{{ route('activiteit.single', $post->id) }}" class="btn btn-primary">Meer >>></a>
                        </div>
                      </div>
                    <div class="col-md-3 ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 clndr-top">
                                <p class=" text-center aantal_aanwezig"> Aantal reacties:</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 events">
                                <h2 class="text-center"> {{ $post->comments()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        @endif


@endsection