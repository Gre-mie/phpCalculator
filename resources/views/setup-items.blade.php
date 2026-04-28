<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <body>
        <a href="/till-basket">test basket</a>

        <h1>{{$name}}</h1>
        <p>What items will your bakery sell?</p>
        <form
            name="till-setup-items"
            action="/till-basket"
            method="POST"
        >
            @csrf


            <input type="submit" value="Done">
            <div id="products-container">
                <div>
                    <img
                        src="./resources/images/croissant.png"
                        alt="A horse shoe shapped pastery."
                    >
                    <lable for="croissant">Croissant<span class="price">£1.50</span></lable>
                    <input type="checkbox" id="croissant" name="croissant" value="1.50">
                </div>
                <div>
                    <img
                        src="./resources/images/victoriaSponge.png"
                        alt="A soft vanila cake with cream and jam."
                    >
                    <lable for="victoria-sponge">Victoria Sponge<span class="price">£4.00</span></lable>
                    <input type="checkbox" id="victoria-sponge" name="victoria-sponge" value="4.00">
                </div>
                <div>
                    <img
                        src="./resources/images/bread.png"
                        alt="A soft bread."
                    >
                    <lable for="bread">Bread<span class="price">£3.50</span></lable>
                    <input type="checkbox" id="bread" name="bread" value="3.50">
                </div>
                <div>
                    <img
                        src="./resources/images/muffin.png"
                        alt="An individual fluffy cake."
                    >
                    <lable for="muffin">Muffin<span class="price">£3.50</span></lable>
                    <input type="checkbox" id="muffin" name="muffin" value="3.50">
                </div>
                <div>
                    <img
                        src="./resources/images/scone.png"
                        alt="A hard crumbly brick with cream and jam."
                    >
                    <lable for="scone">Scone<span class="price">£1.00</span></lable>
                    <input type="checkbox" id="scone" name="scone" value="1.00">
                </div>
                <div>
                    <img
                        src="./resources/images/bakewellTart.png"
                        alt="A tart with almond and jam topped with iceing and a cherry."
                    >
                    <lable for="bakewell-tart">Bakewell tart<span class="price">£2.00</span></lable>
                    <input type="checkbox" id="bakewell-tart" name="bakewell-tart" value="2.00">
                </div>
            </div>
        </form>
    </body>
</html>
