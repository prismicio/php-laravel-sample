<section class="highlight-section l-grid-container">
    <div class="illustration">
        <img src="{!! $slice->getPrimary()->getImage('image')->getUrl() !!}" alt="{!! $slice->getPrimary()->getImage('image')->getAlt() !!}">
    </div>
    <div class="content">
        <div class="title">
            {!! $slice->getPrimary()->getStructuredText('title')->asHtml($linkResolver) !!}
        </div>
        <div class="desc">
            {!! $slice->getPrimary()->getStructuredText('description')->asHtml($linkResolver) !!}
        </div>
        <?php
        $buttonLink = $slice->getPrimary()->getLink('button_link');
        $buttonLabel = $slice->getPrimary()->getText('button_label');
        ?>
        @if($buttonLink && $buttonLabel)
            <div>
                <a class="action cta-button l-grid-container" href="{!! $buttonLink->getUrl($linkResolver) !!}">
                    {!! $buttonLabel !!}
                </a>
            </div>
        @endif
    </div>
</section>
