<?php
use Prismic\Dom\RichText;
use Prismic\Dom\Link;
?>

@extends('layouts.app')

@section('content')

    <div class="homepage" data-wio-id="{!! $document->id !!}">

        <?php $backgroundImageUrl = isset($document->data->background_image->url) ? $document->data->background_image->url : ''; ?>
        <section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url({!! $backgroundImageUrl !!});">
            <div class="banner-content l-grid-container">
                <h1 class="banner-title">{!! RichText::asText($document->data->title) !!}</h1>
                {!! RichText::asHtml($document->data->tagline, $linkResolver) !!}
                <?php
                $buttonUrl = Link::asUrl($document->data->button_link, $linkResolver);
                $buttonText = $document->data->button_text;
                ?>
                @if ($buttonUrl && $buttonText)
                    <a
                        class="banner-button"
                        href="{!! $buttonUrl !!}"
                    >
                        {!! $buttonText !!}
                    </a>
                @endif
            </div>
        </section>

        @foreach ($document->data->body as $slice)
            @switch ($slice->slice_type)
                @case ('highlight_section')
                    @include('partials.slices.highlight-section', ['slice' => $slice])
                    @break
                @case ('banner')
                    @include('partials.slices.banner', ['slice' => $slice])
                    @break
                @case ('quote_banner')
                    @include('partials.slices.quote-banner', ['slice' => $slice])
                    @break
                @case ('featured_section')
                    @include('partials.slices.featured-section', ['slice' => $slice])
                    @break
                @case ('text_section')
                    @include('partials.slices.text-section', ['slice' => $slice])
                    @break
                @case ('image_slider')
                    @include('partials.slices.image-slider', ['slice' => $slice])
                    @break
                @case ('gallery')
                    @include('partials.slices.gallery', ['slice' => $slice])
                    @break
                @case ('video')
                    @include('partials.slices.video', ['slice' => $slice])
                    @break
            @endswitch
        @endforeach

    </div>

@stop
