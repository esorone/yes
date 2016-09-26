 <!-- Default Bootstrap Navbar -->
 @if(Auth::check())
   {{--@if(Auth::user()->is_admin)--}}
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"> <span class="glyphicon glyphicon-ok-sign"></span> Yes,Ik ben AANWEZIG</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
            <li class="{{ Request::is('activiteit') ? "active" : "" }}"><a href="/activiteit">Activiteiten</a></li>
            <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">Over</a></li>
            <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
            <li class="{{ url('/auth/logout') }}"><a href="/auth/logout">Logout</a></li>


          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">

              <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" </span> Hallo  {{ Auth::user()->name }} <span class="caret"></span><br>
              LET OP ADMIN TOEGANG</a>
              <ul class="dropdown-menu">
                <li><a href="{{Route('posts.index')}}"><span class="glyphicon glyphicon-piggy-bank"></span> Activiteit</a></li>
                <li><a href="{{Route('categorieen.index')}}"> <span class="glyphicon glyphicon-info-sign"></span> Categorie</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-off" </span> Uitloggen</i></a></li>
              </ul>
            </li>
              {{--@else--}}

              {{--<a href="{{ route('login') }}" class="btn btn-default"><span class="glyphicon glyphicon-king"></span>inloggen</i></a>--}}


          </ul>
        </div>       <!-- /.container-fluid -->
      </nav><!-- /.navbar-collapse -->@endif
    </div>

