<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('includes.frontend.style')

    <title>Document</title>
</head>
<body>

    <div class="container mx-auto px-24">

        @include('includes.frontend.navbar')

        @yield('content')
    </div>

    @include('includes.frontend.script')
    @yield('script-below')

</body>
</html>