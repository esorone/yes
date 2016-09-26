 <!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
<body>

  @include('partials._navigation')
  <div class="container">
    @include('partials._messages')

    @yield('content')


    <hr>
    @include('partials._footer')

  </div> <!-- end of .container -->
    @include('partials._javascript')
    @yield('scripts')

</body>
</html>