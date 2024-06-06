<!doctype html>
<html lang="en">
   <head>
    @include('layouts.dashboard._head')
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      @yield('content')
        <!-- Sign in Start -->

        @include('layouts.dashboard._foot')
   </body>
</html>
