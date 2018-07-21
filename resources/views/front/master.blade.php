<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @section('head')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/images/favicon.ico">
    <meta name="robots" content="index,follow">

    <link href="{{ mix('/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/fonts.css')}}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PWD89B9');</script>
<!-- End Google Tag Manager -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @show
    </head>

    <body class="@yield('page-class')">

        @include('front/blocks/header')

        <div id="main">
            @yield('content')
        </div>

        @include('front/blocks/footer')

        
        <!-- UTITL FOR ALL PAGE -->
        <div class="backdrop"></div>

        <!-- Google UA (noscript) -->
        

        

        @section('scripts')
        <script src="{{ mix('/js/app.js') }}"></script>

        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-16738211-13');
      </script>

      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWD89B9"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @show
    </body>
    </html>