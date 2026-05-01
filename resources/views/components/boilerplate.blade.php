<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>{{ $title }}</title>
        <style>
            body {
                margin: 0px;
                padding: 1em;
                font-family: sans-serif;
                font-size: 16px;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                align-items: center;

                border: 1px solid red;
            }

            .item-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.7em;
                padding: 0.7em;

                border: 1px solid green;
            }

            .price {
                margin: 0 0.5em;
                font-weight: bold;
            }



        </style>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
