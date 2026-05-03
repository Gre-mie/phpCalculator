@props(['title'=>'PHP Calculator'])

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>{{ $title }}</title>

        @vite('./resources/css/app.css');
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
