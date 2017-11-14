<section class="gallery l-content-section l-grid-container">
    @foreach ($slice->getItems()->getArray() as $item)
        <div class="gallery-item">
            <img src="{!! $item->getImage('image')->getUrl() !!}" alt="{!! $item->getImage('image')->getAlt() !!}">
            {!! $item->getStructuredText('description')->asHtml($linkResolver) !!}
            <?php
            $link = $item->getLink('link');
            $linkText = $item->getText('linkText');
            ?>
            @if($link && $linkText)
                <p class="gallery-link">
                    <a href="{!! $link->getUrl($linkResolver) !!}">{!! $linkText !!}</a>
                </p>
            @endif
        </div>
    @endforeach
</section>
