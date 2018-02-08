@php
    use Prismic\Dom\RichText;

    $sliceLabel = $slice->slice_label;
    if ($sliceLabel) {
        $sectionClass = 'text-section-' . $sliceLabel;
    } else {
        $sectionClass = 'text-section-1col';
    }
@endphp

<section class="text-section l-grid-container {{ $sectionClass }}">
    {!! RichText::asHtml($slice->primary->text, $linkResolver) !!}
</section>
