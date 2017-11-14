<section class="banner l-content-section">
    <img src="{!! $slice->getPrimary()->getImage('image')->getUrl() !!}" alt="{!! $slice->getPrimary()->getImage('image')->getAlt() !!}">
    <div class="cta">
        <div class="cta-text l-grid-container">
            {!! $slice->getPrimary()->getText('title') !!}
        </div>
        <?php
        $link = $slice->getPrimary()->getLink('link');
        $linkText = $slice->getPrimary()->getText('linkText');
        ?>
        @if($link && $linkText)
            <div>
                <a class="cta-button l-grid-container" href="{!! $link->getUrl($linkResolver) !!}">
                    {!! $linkText !!}
                </a>
            </div>
        @endif
    </div>
</section>
