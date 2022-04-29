<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>What about us? &hearts;</title>

    </head>
    <body>
      <h1>Coucou</h1>
      <p>here is a <a href="/about-us">link about us</a></p>
    <p>the current time is {{ date('h:i a, l F j, Y')  }}</p>

    <footer>
        <p>&copy; Copyright {{ date('Y') }} &middot;</p>
    </footer>
    </body>
</html>
