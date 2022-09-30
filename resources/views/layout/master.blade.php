<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Ajax CRUD</title>
    @include('layout.inc.style')
  </head>
  <body>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    @include('layout.inc.script')
  </body>
</html>
