@props(['title'=>'PHP Calculator'])

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>{{ $title }}</title>
        <style>
            :root {
                --background-colour: white;
                --button-text: white;
                --button-background: #40ACCF;
                --border-pink: #CA36AA;

            }

            body {
                margin: 0px;
                padding: 1em;
                min-height: 90vh;
                font-family: sans-serif;
                font-size: 18px;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 0.5em;

                background: var(--background-colour);
                border: 1px solid red;
            }

            h1, p {
                margin: 0;
            }

            button, .button {
                border-radius: 0.5em;
                border: none;
            }


            .container {
                display:flex;
                flex-direction: column;
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

            .button {
                font-weight: bold;
                font-size: 18px;
                color: var(--button-text);
                padding: 0.5em;
                background: var(--button-background);
                border: 2px solid var(--button-background);
            }
            .button:hover {
                border-color: var(--border-pink);
            }

            .large-button {
                display: flex;
                align-self: center;
                max-width: 500px;
                padding: 0.5em 2em;
                font-size: 18px;
            }

            .text-field {
                min-width: 300px;
                padding: 0.5em;
                font-size: 18px;
                border: 1px solid var(--button-background);
                border-radius: 3px;
            }







        </style>

    </head>
    <body>
        {{ $slot }}
    </body>
</html>
