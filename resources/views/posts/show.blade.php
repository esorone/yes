@extends('main')

@section('title', '| Bekijk de wedstrijd')

@section('content')
<div class="post_bg">

{{-- De   <h1>{{ $post->title }}</h1> vindt in in de PostController en pakt de kolom genaamd title.
test het met b.v. http://localhost:8000/posts/10  <- tien is dan de id
 --}}
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
            <hr>
            DIT IS POST SHOW BLADE
            <div id="backend-comments">
                <h3>Aantal reacties en of smoezen <small>{{ $post->comments()->count() }}</small></h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Naam</th>
                        <th>Reactie:</th>
                        <th>Aanwezig:</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                        <tr>
                            <td><img class="img_size_comments_xs" src="{{ asset('images/'. $comment->user->avatar) }}" alt="avatar"></td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>                @if ($comment->aanwezig === 1)
                                    <span class="glyphicon glyphicon-ok">
                    @else <span class="glyphicon glyphicon-remove">
                                @endif</td>
                            <td><a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td><a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>URL Slug:</label>
                    <p><a href="{{ route('activiteit.single', $post->slug) }}">{{route('activiteit.single', $post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Toegevoegd op:</label>
                    <p>{{ date( 'j, M, Y', strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Laatste update:</label>
                    <p>{{ date( 'j, M, Y, H:i ', strtotime($post->updated_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Categorie:</label>
                    <p>{{$post->categorie->name}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{--de post.edit haal je weer uit je artisan route:list--}}
                        {{--{{ het Onderstaande is de laravel oplossing incl. route etc
                        van --<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                        {!! Html::linkRoute('posts.edit','Edit',array($post->id), array('class' => 'btn btn-primary btn-block')) !!}

                    </div>
                    <div class="col-sm-6">
                        {{--Let op!!posts.destroy is natuurlijk geen echte view. vandaar deze form  --}}
                        {!! Form::open(['route' => ['posts.destroy', $post->id],'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {!! Html::linkRoute('posts.index', '<< check alle activiteiten', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

