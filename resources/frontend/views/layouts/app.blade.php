<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <!-- bootstrap.min.css -->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" />
        <!-- Owl Carousel -->
        <link href="{{asset('assets/frontend/css/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}" rel="stylesheet" />
        <!-- custom -->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
    </head>

    <body>
    <div id="app">
        @include('partials.header')
            <div id="main">
                @yield('content')
            </div>
        @include('partials.footer')
    </div>
     <!--jquery min  -->
     <script src="{{asset('assets/frontend/js/jquery-slim.min.js')}}"></script>
     <!--bootstrap.min  -->
     <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
     <!--popper.min  -->
     <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
     <!--popper.min  -->
     <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
     <!-- imagesloaded -->
     <script src="{{asset('assets/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
     <!-- owl -->
     <script src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
     <!-- Custom jquery -->
     <script src="{{asset('assets/frontend/js/script.js')}}"></script>
     <!-- fontawesome -->
     <script src="https://use.fontawesome.com/8ae5a19cac.js"></script>
  <script>
    $("document").ready(function() {
        setTimeout(function() {
            $("div.alert").remove();
        }, 5000); // 5 secs

    });
</script>
</body>

</html>
