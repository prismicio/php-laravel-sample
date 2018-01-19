<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>

<section class="highlight-section l-grid-container">
    @if (isset($slice->primary->image->url))
        <div class="illustration">
            <img src="{!! $slice->primary->image->url !!}" alt="{!! $slice->primary->image->alt !!}">
        </div>
    @endif
    <div class="content">
        <div class="title">
            {!! RichText::asHtml($slice->primary->title, $linkResolver) !!}
        </div>
        <div class="desc">
            {!! RichText::asHtml($slice->primary->description, $linkResolver) !!}
        </div>
        <?php
        $buttonLinkUrl = Link::asUrl($slice->primary->button_link, $linkResolver);
        $buttonLabel = RichText::asText($slice->primary->button_label);
        ?>
        @if ($buttonLinkUrl && $buttonLabel)
            <div>
                <a class="action cta-button l-grid-container" href="{!! $buttonLinkUrl !!}">
                    {!! $buttonLabel !!}
                </a>
            </div>
        @endif
    </div>
</section>
