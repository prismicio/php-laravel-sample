<?php $sectionClasses = strtolower(implode(' ', [$slice->getPrimary()->getText('quote_position'), $slice->getPrimary()->getText('quote_style')])); ?>

<section class="quote-banner l-grid-container {!! $sectionClasses !!}" style="background-image: url({!! $slice->getPrimary()->getImage('background_image')->getUrl() !!});">
    <div class="l-grid-container container-text">
        <div class="quote-container l-grid-container">
            <div class="quote">
                {!! $slice->getPrimary()->getStructuredText('quote')->asHtml($linkResolver) !!}
            </div>
            <div class="author">
                {!! $slice->getPrimary()->getStructuredText('quote_author')->asHtml($linkResolver) !!}
            </div>
        </div>
    </div>
</section>
