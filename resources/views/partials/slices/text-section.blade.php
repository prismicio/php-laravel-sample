<?php
$sliceLabel = $slice->getLabel();
if ($sliceLabel) {
    $sectionClass = 'text-section-' . $sliceLabel;
} else {
    $sectionClass = 'text-section-1col';
}
?>

<section class="text-section l-grid-container {!! $sectionClass !!}">
    {!! $slice->getPrimary()->getStructuredText('text')->asHtml($linkResolver) !!}
</section>
