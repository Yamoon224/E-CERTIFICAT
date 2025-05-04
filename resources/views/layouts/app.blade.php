<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="APP GESTION CLINIQUE" name="description"/>
        <meta content="AJS" name="author"/>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/armoirie.png') }}">  

        @stack('links')
        <link rel="stylesheet" href="{{ asset('bower_components/uikit/css/uikit.almost-flat.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('assets/icons/flags/flags.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('assets/css/style_switcher.min.css') }}" media="all">

        <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" media="all">

        <link rel="stylesheet" href="{{ asset('assets/css/themes/themes_combined.min.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all">

        <!-- matchMedia polyfill for testing media queries in JS -->
        <!--[if lte IE 9]>
            <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
            <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <![endif]-->
        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    </head>
    <body class="sidebar_main_open sidebar_main_swipe">
        <x-app-header></x-app-header>
        <x-app-aside></x-app-aside>

        <div id="page_content">
            <div id="page_content_inner">
                {{ $slot }}
            </div>
        </div>
        {{ $others ?? '' }}

        <x-app-footer></x-app-footer>
        <x-app-sidebar></x-app-sidebar>
        <script>
            WebFontConfig = {
                google: { families: ['Source+Code+Pro:400,700:latin', 'Roboto:400,300,500,700,400italic:latin'] }
            };
            (function() {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>

        <!-- common functions -->
        <script src="{{ asset('assets/js/common.min.js') }}"></script>
        <script src="{{ asset('assets/js/uikit_custom.min.js') }}"></script>
        <script src="{{ asset('assets/js/altair_admin_common.min.js') }}"></script>

        <!-- page specific plugins -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-65191727-1', 'auto');
            ga('send', 'pageview');
        </script>
        @stack('scripts')
        <x-app-switcher></x-app-switcher>
        <script>
            var typed = new Typed('#typed', {
                strings: ['BIENVENU A <b>E-CERTIFICAT DE RESIDENCE</b>', ' DES CITOYENS'],
                typeSpeed: 150,  
                smartBackspace: true,
                loop: true,
                loopCount: Infinity,
            });
        </script>
    </body>
</html>
