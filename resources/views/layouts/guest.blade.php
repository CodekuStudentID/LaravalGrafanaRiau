<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-adsense-account" content="ca-pub-5365219857720500">
        <meta name="description" content="@yield('meta_description', 'Portal berita resmi Buletin Kampar - Informasi terkini seputar Kampar, Siak, dan Riau.')">
        <meta property="og:image" content="{{ asset('img/logo.webp') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1DDD3WDG5P"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-1DDD3WDG5P');
        </script>
        
        <title>@yield('title', 'Dunia Kampar')</title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="{{ asset('img/logo-v1.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5365219857720500"
        crossorigin="anonymous"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img src="{{asset('img/1774678106345-removebg-preview.png')}}" width="150" height="150" alt="" srcset="">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <script>
(function(ndz){
var d = document,
    s = d.createElement('script'),
    l = d.scripts[d.scripts.length - 1];
s.settings = ndz || {};
s.src = "\/\/superbjudgment.com\/bFXbVBs.d_GZl\/0wYFWacv\/HeLm\/9BumZnU-ljkBPHTjYs5tNKDvQ\/yxMqDTEPt\/NLj\/k\/0ANDDVIOwuNlQY";
s.async = true;
s.referrerPolicy = 'no-referrer-when-downgrade';
l.parentNode.insertBefore(s, l);
})({})
</script>
    </body>
</html>
