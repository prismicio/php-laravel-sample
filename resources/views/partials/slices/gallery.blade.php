<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>

<section class="gallery l-content-section l-grid-container">
    @foreach ($slice->items as $item)
        <div class="gallery-item">
            @if (isset($item->image->url))
                <img src="{{ $item->image->url }}" alt="{{ $item->image->alt }}">
            @endif
            {!! RichText::asHtml($item->description, $linkResolver) !!}
            <?php
            $linkUrl = Link::asUrl($item->link, $linkResolver);
            $linkText = $item->link_text;
            ?>
            @if ($linkUrl && $linkText)
                <p class="gallery-link">
                    <a href="{{ $linkUrl }}">
                        {{ $linkText }}
                    </a>
                </p>
            @endif
        </div>
    @endforeach
</section>
