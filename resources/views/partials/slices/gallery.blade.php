@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;
@endphp

<section class="gallery l-content-section l-grid-container">
    @foreach ($slice->items as $item)
        @php
            $linkUrl = Link::asUrl($item->link, $linkResolver);
            $linkText = $item->link_text;
        @endphp
        <div class="gallery-item">
            @if (isset($item->image->url))
                <img src="{{ $item->image->url }}" alt="{{ $item->image->alt }}">
            @endif
            {!! RichText::asHtml($item->description, $linkResolver) !!}
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
