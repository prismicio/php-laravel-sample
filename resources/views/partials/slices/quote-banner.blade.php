<?php
use Prismic\Dom\RichText;

$sectionClasses = strtolower(implode(' ', [$slice->primary->quote_position, $slice->primary->quote_style]));
?>

<section class="quote-banner l-grid-container {!! $sectionClasses !!}" style="background-image: url({!! $slice->primary->background_image->url !!});">
    <div class="l-grid-container container-text">
        <div class="quote-container l-grid-container">
            <div class="quote">
                {!! RichText::asHtml($slice->primary->quote, $linkResolver) !!}
            </div>
            <div class="author">
                {!! RichText::asHtml($slice->primary->quote_author, $linkResolver) !!}
            </div>
        </div>
    </div>
</section>
