<div class="featured-section l-grid-container">
    <div class="content">
        <div class="title">
            {!! $slice->getPrimary()->getStructuredText('title')->asHtml($linkResolver) !!}
        </div>
        <div class="text">
            {!! $slice->getPrimary()->getStructuredText('text')->asHtml($linkResolver) !!}
        </div>
    </div>
    <div class="illustration">
        <img src="{!! $slice->getPrimary()->getImage('image')->getUrl() !!}" alt="{!! $slice->getPrimary()->getImage('image')->getAlt() !!}">
    </div>
</div>
