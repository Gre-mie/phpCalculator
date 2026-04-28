<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Php Calculator</title>
    </head>
    <body>
        <h1>Till Setup</h1>
        <p>What is the name of your bakery?<p>
        <form
            name="till-setup-name"
            method="POST"
            action="/setup-items"
        >
            @csrf

            <label for="input-bakery-name">Name: </label>
            <input
                type="text"
                id="input-bakery-name"
                name="name"
                required
                minlength="5"
                maxlength="30"
            >
            <input type="submit" value="->">

            <a href="/setup-items">test page: setup-items</a>
        </form>
    </body>
</html>
