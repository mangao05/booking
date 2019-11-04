<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>HavendWell</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hotel-datepicker.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'/>
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.11.7/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('../img/sampleLogo.png') }}">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    @yield('style')
</head>

<body >
    <div id="app">
    <div style="overflow-x:hidden">
        <div class="box-shadow">
            @include('partial.navigation')
        </div>
            @yield('content')
        @include('partial.footer')
    </div>

</div>
   
    <script src="{{ asset('js/app.js') }}"></script>  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fecha/2.3.3/fecha.min.js'></script>
    <script src="{{ asset('js/hotel-datepicker.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.11.7/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js'></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    {{-- <script src="{{ asset('js/kronos.js') }}"></script>   --}}
    <script>
        new WOW().init();
        $(document).ready(function(){
            var pathname = window.location.pathname;
            if(pathname != '/'){
                $('.box-shadow').css('position','relative');
                $('.nav-link').css('color','#800080'); 
                $('.box-shadow').css('background-image',"url('/img/img17_new.png')"); 
                $('.box-shadow').css('background-size','cover'); 
                $('.box-shadow').css('background-position','center'); 
                $('.box-shadow').css('background-repeat','no repeat'); 
            }
            // alert(pathname);
            $(function() {
                $('.lazy').lazy();
            });
        });

        $(document).ready(function(){
            $("#readMore").click(function(){
                $("#showReadmore1, #showReadmore2").slideToggle("slow");
                if($(this).html() == 'Read More'){
                    $(this).html('Read Less');
                }
                else{
                    $(this).html('Read More');
                }
            });
        });

    </script>
    @yield('script')

</body>
</html>