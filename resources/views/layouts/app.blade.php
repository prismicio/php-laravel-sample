<!DOCTYPE html>
<html lang="{!! $currentLang !!}">
<head>
    {{--  Meta  --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="prismic.io">

    {{--  Meta Title --}}
    @if (isset($meta['title']))
        <title>{!! $meta['title'] !!}</title>
    @else
        <title>Laravel sample</title>
    @endif

    {{--  Meta Description --}}
    @if (isset($meta['description']))
        <meta description="{!! $meta['description'] !!}">
    @else
        <meta description="Laravel sample website by prismic.io">
    @endif

    {{--  Favicon  --}}
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon" type="image/x-icon">

    {{--  Fonts  --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,300,700,700i,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--  Style  -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--  Scripts  --}}
    <script>
        // Required for previews and experiments
        window.prismic = {
            endpoint: '{{ $endpoint }}'
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://static.cdn.prismic.io/prismic.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

    @include('partials/header')

    <main>
        @yield('content')
    </main>

    @include('partials/footer')

</body>
</html>
