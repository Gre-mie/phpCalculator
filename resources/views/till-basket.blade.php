<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <body>
        <h1>bakery name ==> {{ $name }}</h1>
        <div id="backet-container">
            <h2>Basket:</h2>
            <table id="backet">
                <tr id="basket-croissant">
                    <td class="name">croissant</td>
                    <td>£<span class="price">{{ $croissant }}</span></td>
                </tr>
                <tr id="basket-victoria-sponge">
                    <td class="name">victoria sponge</td>
                    <td>£<span class="price">{{ $victoriaSponge }}</span></td>
                </tr>
                <tr id="basket-bread">
                    <td class="name">bread</td>
                    <td>£<span class="price">{{ $bread }}</span></td>
                </tr>
                <tr id="basket-muffin">
                    <td class="name">muffin</td>
                    <td>£<span class="price">{{ $muffin }}</span></td>
                </tr>
                <tr id="basket-scone">
                    <td class="name">scone</td>
                    <td>£<span class="price">{{ $scone }}</span></td>
                </tr>
                <tr id="basket-bakewell-tart">
                    <td class="name">bakewell tart</td>
                    <td>£<span class="price">{{ $bakewellTart }}</span></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Discount:</th>
                    <td><span id="display-discount">0</span>%</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>£<span id="display-total">0.00</span></td>
                </tr>
            </table>
        </div>
        <div id="products-container">
            <h2>Products:</h2>
            <div class="products-container">

                <button id="product-croissant">
                    <img src="./resources/images/croissant.png" alt="Croissant">
                </button>
                <button id="product-victoria-sponge">
                    <img src="./resources/images/victoriaSponge.png" alt="Victoria sponge">
                </button>
                <button id="product-bread">
                    <img src="./resources/images/bread.png" alt="Bread">
                </button>
                <button id="product-muffin">
                    <img src="./resources/images/muffin.png" alt="Muffin">
                </button>
                <button id="product-scone">
                    <img src="./resources/images/scone.png" alt="Scone">
                </button>
                <button id="product-bakewell-tart">
                    <img src="./resources/images/bakewellTart.png" alt="Bakewell tart">
                </button>
            </div>
            <button id="button-discount">Add 10% discount</button>
            <button id="pay-button">Pay</button>
        </div>
    </body>
</html>
