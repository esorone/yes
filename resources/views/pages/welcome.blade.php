    @extends('main')

    @section('title', '| Yes ik ben er')

    @section('content')
   <div class="post_bg">

      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Yes ik ben aanwezig</h1>
            <p class="lead">Top dat jij er eindelijk ook eens bent. <br>Hieronder de aankomende activiteiten <br></p>
        <div class="col-md-12 text-center">
            <p class="label-danger" style="font-size: 1.2em; color: #fff;">LET OP.. App is nog een beta en moet verder verfijnd worden</p>
        </div>
          </div>
        </div>
      </div>
      <!-- end of header .row -->
        <div class="row">
        @foreach($posts as  $post)

                <div class="col-sm-8 form-spacing-top">
                    <div class="row">
                        <div class="col-md-4 ">
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
                        <div class="col-md-8 box1 ">
                            <div class="row marge_bottom">
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                    <h3> {{ $post->title }} </h3> <br>
                                    {{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12 btn_bottom">
                                    <a href="{{ route('activiteit.single', $post->id) }}" class="btn btn-primary">Meer >>></a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div><br><hr>
        @endforeach
        <div class="col-md-3 col-md-offset-1" style="border-left: 1px dotted #6b6770 ">
          <h2>Hier komen de stats</h2>
         </div>
    </div>

    @endsection