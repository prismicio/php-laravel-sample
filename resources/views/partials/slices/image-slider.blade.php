<section class="slider l-content-section l-grid-container">
    <ul class="js-image-slider">
        @foreach($slice->getItems()->getArray() as $item)
            <?php $image = $item->getImage('image') ?>
            @if($image)
                <li>
                    <img src="{!! $image->getUrl() !!}" alt="{!! $image->getAlt() !!}">
                </li>
            @endif
        @endforeach
    </ul>
</section>
