<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ePortal')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>

    @include('layout.header')  {{-- Include Header --}}

    <main>
        @yield('content')        {{-- Main Content Area --}}
    </main>

    @include('layout.footer')  {{-- Include Footer --}}
    <script>
        @yield('scripts') {{-- Include any additional scripts --}}  
    </script>
</body>
</html>
