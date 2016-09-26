    @extends('main')
    @section('title', '| Maak een activiteit')
    @section('stylesheets')
      {!! Html::style('css/parsley.css') !!}
      {!!Html::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css')!!}
    @endsection
    @section('content')
    <div class="post_bg">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Voor een nieuwe activiteit in</h1>
            <hr>
                {{--De route kun je herleiden uit de php artisan route:list en dan Name 
                'form data-parsley-validate' => '' = stylesheet opmaak van javascript validate
                hetzelfde geldt voor 'required' => ''. DUS MET een lege string =>''
                check de website
                --}}

              {!! Form::open(array('route' => 'posts.store', 'form data-parsley-validate' => '')) !!}
                {{ Form::label('title', 'Activiteit:')}}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '','maxlength' => '250'))}}

                {{ Form::label('date', 'Datum:')}}
               {{ Form::text('date', null, array('id' => 'datepicker', 'class' => 'form-control','required' => '')) }}
                {{--{{ Form::text('date', null, array('class' => 'form-control', 'required' => ''))}}--}}

                {{ Form::label('slug', 'Slug:')}}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '225', 'minlength' => '5'))}}

                {{ Form::Label('categorie_id', 'Categorie') }}
                 <select class="form-control" name="categorie_id" id="categorie">
                    @foreach($categorieen as $categorie)
                         <option value='{{$categorie->id}}'>{{$categorie->name}}</option>
                    @endforeach
                </select>

                {{ Form::label('body', 'Bijzonderheden:')}}
                {{ Form::textarea('body', NULL, array('class' => 'form-control', 'required' => ''))}}

                {{ Form::submit('Verstuur', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:1em')) }}
              {!! Form::close() !!}
        </div>
      </div>
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