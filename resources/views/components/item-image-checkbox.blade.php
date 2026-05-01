<div style='
    display: flex;
    flex-direction: column;
    padding: 0.5em;
    min-width: 200px;
    max-width: 500px;

    border-radius: 0.5em;

    border: 1px solid blue;
'>
    <img
        style="
            flex-grow: 1;
        "
        src="{{ $imagePath }}"
        alt="{{ $description }}"
    >
    <div>
        <lable for={{ $id }}>
            <span>{{ $name }}</span>
        </lable>

        <span class="price" style="margin-right: 0; margin-left: 0.3em;">£{{ $price }}</span>
        <input
            type="checkbox"
            id={{ $id }}
            name={{ $id }}
            value="{{ $price }}"
            style="margin-left: 0px;"
        >
    </div>
</div>



