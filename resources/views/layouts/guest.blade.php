<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="msapplication-tap-highlight" content="no"/>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('images/armoirie.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('images/armoirie.png') }}" sizes="32x32">

        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

        <!-- uikit -->
        <link rel="stylesheet" href="{{ asset('bower_components/uikit/css/uikit.almost-flat.min.css') }}"/>
        @stack('links')
        <link rel="stylesheet" href="{{ asset('assets/icons/flags/flags.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('assets/css/style_switcher.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('assets/css/login_page.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    </head>
    <body class="login_page {{ $version ?? '' }}">
        {{ $slot }}
        
        <script src="{{ asset('assets/js/common.min.js') }}"></script>
        <script src="{{ asset('assets/js/uikit_custom.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/login.min.js') }}"></script>
        <script src="{{ asset('assets/js/altair_admin_common.min.js') }}"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-65191727-1', 'auto');
            ga('send', 'pageview');
        </script>
        @stack('scripts')
    </body>
</html>
