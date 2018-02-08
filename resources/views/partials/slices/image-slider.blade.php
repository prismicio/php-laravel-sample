<section class="slider l-content-section l-grid-container">
    <ul class="js-image-slider">
        @foreach ($slice->items as $item)
            @if (isset($item->image->url))
                <li>
                    <img src="{{ $item->image->url }}" alt="{{ $item->image->alt }}">
                </li>
            @endif
        @endforeach
    </ul>
</section>
