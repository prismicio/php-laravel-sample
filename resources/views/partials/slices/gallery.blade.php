<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>

<section class="gallery l-content-section l-grid-container">
    @foreach ($slice->items as $item)
        <div class="gallery-item">
            <img src="{!! $item->image->url !!}" alt="{!! $item->image->alt !!}">
            {!! RichText::asHtml($item->description, $linkResolver) !!}
            <?php
            $linkUrl = Link::asUrl($item->link, $linkResolver);
            $linkText = $item->linkText;
            ?>
            @if ($linkUrl && $linkText)
                <p class="gallery-link">
                    <a href="{!! $linkUrl !!}">
                        {!! $linkText !!}
                    </a>
                </p>
            @endif
        </div>
    @endforeach
</section>
