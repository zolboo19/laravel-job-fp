<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job Finder &mdash; </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('partialsjob.head')

  </head>
  <body>

  <div class="site-wrap">

    @include('partialsjob.nav')

    <div style="height: 113px;"></div>

    @yield('content')
    @include('partialsjob.findjob')


    @include('partialsjob.categories')


    {{-- @include('partialsjob.resentjob') --}}

    {{-- @include('partialsjob.testimonies') --}}


    @include('partialsjob.yourdreamjob')



    {{-- @include('partialsjob.whychooseus') --}}




    {{-- @include('partialsjob\blog') --}}




    @include('partialsjob.footer')
  </div>

    @include('partialsjob.scriptsjob')

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd'
            }).val();
    } );
    </script>
  </body>
</html>
