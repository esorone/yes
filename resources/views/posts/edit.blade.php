@extends('main')
@section('title', '| Activiteit aanpassen')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!!Html::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css')!!}
@endsection
@section('content')
    <div class="post_bg">


    {{-- De   <h1>{{ $post->title }}</h1> vindt in in de PostController en pakt de kolom genaamd title.
    test het met b.v. http://localhost:8000/posts/10  <- tien is dan de id
     --}}
    <div class="row">
        {{--Form::model is om het voorgaande formulier te binden aand dit model dit d.m.v $post en te linken aan route
        Model-Form Binding--}}
        {{-- Deze zorgt ervoor dat de juiste url gekozen wordt. Check maar de combinatie tussen url en name
                                                               -Method    | URI                | Name--}}
        {{--Check in post:list welke method er wordt verwacht | PUT|PATCH | posts/{posts}      | posts.update--}}
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}


        <div class="col-md-8">
            {{ Form::label('title', 'Titel:') }}
            {{ Form::text('title', null, ['class' => 'form-control input-lg ']) }}
            {{ Form::label('date', 'Datum:')}}
            {{ Form::text('date', null, array('id' => 'datepicker', 'class' => 'form-control','required' => '')) }}
            {{ Form::Label('categorie_id', 'Categorie', ['class' => 'form-spacing-top']) }}
            <select class="form-control " name="categorie_id" id="categorie">
                @foreach($categorieen as $categorie)
                    <option value='{{$categorie->id}}'>{{$categorie->name}}</option>
                @endforeach
            </select>
            {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top'])}}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '225', 'minlength' => '5'))}}
            {{ Form::label('body', 'Bijzonderheden:',['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control'] ) }}

        </div>


        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>URL Slug:</label>
                    <p><a href="{{ url($post->slug) }}">{{url($post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Toegevoegd op:</label>
                    <p>{{ date( 'j, M, Y', strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Laatste update:</label>
                    <p>{{ date( 'j, M, Y, H:i ', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('Save',['class' => 'btn btn-success btn-block']) }}
                    </div>
                    <div class="col-sm-6">
                        {{--de post.edit haal je weer uit je artisan route:list--}}
                        {{--{{ het Onderstaande is de laravel oplossing incl. route etc
                        van --<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                        {!! Html::linkRoute('posts.show','Herstel',array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div> <!-- end of row -->
  </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('//code.jquery.com/ui/1.11.2/jquery-ui.js') !!}
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });
    </script>
@endsection