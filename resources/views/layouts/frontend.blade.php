<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('asset/icon/favicon.png') }}" type="image/png" sizes="16x16">

    @include('includes.frontend.style')
    @yield('style-below')

    <title>@yield('title')</title>
</head>
<body>

    <div class="container mx-auto px-12 lg:px-24">

        @include('includes.frontend.navbar')

        @yield('content')
    </div>

    @include('includes.frontend.bottom-navbar')

    @include('includes.frontend.script')
    @yield('script-below')

</body>
</html>