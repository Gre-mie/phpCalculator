<x-boilerplate title="setup items">

    @php
        $items = [
            [
                'id' => 'croissant',
                'name' => 'Croissant',
                'price' => '1.50',
                'imagePath' => './resources/images/croissant.png',
                'description' => 'A horse shoe shapped pastery.'
            ],
            [
                'id' => 'victoria-sponge',
                'name' => 'Victoria Sponge',
                'price' => '4.00',
                'imagePath' => './resources/images/victoriaSponge.png',
                'description' => 'A soft vanila cake with cream and jam.'
            ],
            [
                'id' => 'bread',
                'name' => 'Bread',
                'price' => '3.50',
                'imagePath' => './resources/images/bread.png',
                'description' => 'A soft bread.'
            ],
            [
                'id' => 'muffin',
                'name' => 'Muffin',
                'price' => '3.50',
                'imagePath' => './resources/images/muffin.png',
                'description' => 'An individual fluffy cake.'
            ],
            [
                'id' => 'scone',
                'name' => 'Scone',
                'price' => '1.00',
                'imagePath' => './resources/images/scone.png',
                'description' => 'A hard crumbly brick with cream and jam.'
            ],
            [
                'id' => 'bakewell-tart',
                'name' => 'Bakewell tart',
                'price' => '2.00',
                'imagePath' => './resources/images/bakewellTart.png',
                'description' => 'A tart with almond and jam topped with iceing and a cherry.'
            ],
        ];
    @endphp


    <h1>{{$name}}</h1>
    <p>What items will your bakery sell?</p>

    <form
        name="till-setup-items"
        action="/till-basket"
        method="POST"
    >
        @csrf

        <input type="submit" value="Done">
        <div class="item-container">

            @foreach ($items as $row)
                <x-item-image-checkbox
                    :id="$row['id']"
                    :name="$row['name']"
                    :price="$row['price']"
                    :imagePath="$row['imagePath']"
                    :description="$row['description']"
                ></x-item-image-checkbox>
            @endforeach

        </div>
    </form>
</x-boilerplate>

