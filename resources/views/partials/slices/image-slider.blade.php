<section class="slider l-content-section l-grid-container">
    <ul class="js-image-slider">
        @foreach ($slice->items as $item)
            <li>
                <img src="{!! $item->image->url !!}" alt="{!! $item->image->alt !!}">
            </li>
        @endforeach
    </ul>
</section>
