<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>@yield('title', 'default title')</title>

    </head>
    <body class="flex flex-col items-center justify-between min-h-screen py-5">
        <main role="'main" class="flex flex-col items-center">
            @yield('content')
        </main>

        @include('partials._footer')
    </body>
</html>
