<x-boilerplate>
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
    </form>
</x-boilerplate>
