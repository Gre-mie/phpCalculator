<x-boilerplate title="setup items">

    @php
        $items = [
            [
                'id' => 'croissant',
                'name' => 'Croissant',
                'price' => '1.50',
                'image-path' => './resources/images/croissant.png',
                'description' => 'A horse shoe shapped pastery.'
            ],
            [
                'id' => 'victoria-sponge',
                'name' => 'Victoria Sponge',
                'price' => '4.00',
                'image-path' => './resources/images/victoriaSponge.png',
                'description' => 'A soft vanila cake with cream and jam.'
            ],
            [
                'id' => 'bread',
                'name' => 'Bread',
                'price' => '3.50',
                'image-path' => './resources/images/bread.png',
                'description' => 'A soft bread.'
            ],
            [
                'id' => 'muffin',
                'name' => 'Muffin',
                'price' => '3.50',
                'image-path' => './resources/images/muffin.png',
                'description' => 'An individual fluffy cake.'
            ],
            [
                'id' => 'scone',
                'name' => 'Scone',
                'price' => '1.00',
                'image-path' => './resources/images/scone.png',
                'description' => 'A hard crumbly brick with cream and jam.'
            ],
            [
                'id' => 'bakewell-tart',
                'name' => 'Bakewell tart',
                'price' => '2.00',
                'image-path' => './resources/images/bakewellTart.png',
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
        class="container";
    >
        @csrf

        <x-submit-form-button/>

        <div class="item-container" style="margin-top: 1em;">

            @foreach ($items as $row)
                <x-item-image-checkbox
                    :id="$row['id']"
                    :name="$row['name']"
                    :price="$row['price']"
                    :image-path="$row['image-path']"
                    :description="$row['description']"
                ></x-item-image-checkbox>
            @endforeach

        </div>
    </form>
</x-boilerplate>

