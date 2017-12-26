<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>

<section class="banner l-content-section">
    <img src="{!! $slice->primary->image->url !!}" alt="{!! $slice->primary->image->alt !!}">
    <div class="cta">
        <div class="cta-text l-grid-container">
            {!! RichText::asText($slice->primary->title) !!}
        </div>
        <?php
        $linkUrl = Link::asUrl($slice->primary->link);
        $linkText = RichText::asText($slice->primary->linkText);
        ?>
        @if ($linkUrl && $linkText)
            <div>
                <a class="cta-button l-grid-container" href="{!! $linkUrl !!}">
                    {!! $linkText !!}
                </a>
            </div>
        @endif
    </div>
</section>
