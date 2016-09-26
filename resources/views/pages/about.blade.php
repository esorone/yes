  @extends('main')
    @section('title', '| Over Yes ik ben er')
    @section('content')
     <div class="post_bg">
        <div class="row">
            <div class="col-md-12">
                <h1>Yes ik ben aanwezig app is bijna echt gereed</h1>
                <p class="label-danger" style="font-size: 2em; color: #fff;">LET OP.. App is nog een beta en moet verder verfijnd worden</p>
            </div>
        </div>
         <hr>
         <div class="row">
             <div class="col-md-6"><p>De app wordt primair gebruikt om aan te geven of je aan een activiteit deelneemt op niet. Via de reacties kun je aangeven of je aanwezig bent.</p>
                 <p>Klik op de button {!! Form::checkbox('aanwezig', '1', true, array('data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee')) !!}  Om aan te geven of je aanwezig bent</p>
                 <br>
                 {!! Form::checkbox('aanwezig', '1', true, array('data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee')) !!} Geeft aan dat je aanwezig bent
                 <br><br>
                 {!! Form::checkbox('aanwezig', '0', false, array('data-toggle' => 'toggle', 'data-on' => 'Ja', 'data-off' => 'Nee')) !!} Geeft aan dat je afwezig bent.</div>
             <div class="col-md-6" style="border-left: 1px dotted gray"><p class="text-center">Nadat je het reactie formulier verstuurd hebt, is de reactie vastgelegd</p><br>
                 <div class="col-md-12">

                     {{ Form::textarea('comment', 'Geef je reactie', ['class' => 'form-control']) }}
                     {{ Form::submit('Voeg toe', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

                 </div></div>
         </div>

         <a href="{{ URL::route('activiteit.index') }}" class="btn btn-default"> Terug </a>

    </div>
    @endsection

