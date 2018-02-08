@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;

    $linkUrl = Link::asUrl($slice->primary->link);
    $targetAttr = property_exists($slice->primary->link, 'target') ? 'target="' . $slice->primary->link->target . '" rel="noopener"' : '';
    $linkText = RichText::asText($slice->primary->link_text);
@endphp

<section class="banner l-content-section">
    @if (isset($slice->primary->image->url))
        <img src="{{ $slice->primary->image->url }}" alt="{{ $slice->primary->image->alt }}">
    @endif
    <div class="cta">
        <div>
            <div class="cta-text l-grid-container">
                {{ RichText::asText($slice->primary->title) }}
            </div>
            @if ($linkUrl && $linkText)
                <div>
                    <a
                        class="cta-button l-grid-container"
                        href="{{ $linkUrl }}"
                        {{ $targetAttr }}
                    >
                        {{ $linkText }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
