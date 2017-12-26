<?php
use Prismic\Dom\RichText;
?>

<div class="featured-section l-grid-container">
    <div class="content">
        <div class="title">
            {!! RichText::asHtml($slice->primary->title, $linkResolver) !!}
        </div>
        <div class="text">
            {!! RichText::asHtml($slice->primary->text, $linkResolver) !!}
        </div>
    </div>
    <div class="illustration">
        <img src="{!! $slice->primary->image->url !!}" alt="{!! $slice->primary->image->alt !!}">
    </div>
</div>
