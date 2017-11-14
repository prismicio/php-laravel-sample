@extends('layouts.app')

@section('content')

    <div class="homepage" data-wio-id="{!! $document->getId() !!}">

        <section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url({!! $document->getImage('homepage.backgroundImage')->getUrl() !!});">
            <div class="banner-content l-grid-container">
                <h1 class="banner-title">{!! $document->getText('homepage.title') !!}</h1>
                {!! $document->getStructuredText('homepage.tagline')->asHtml($linkResolver) !!}
                <a
                    class="banner-button"
                    href="{!! $document->getLink('homepage.buttonLink')->getUrl($linkResolver) !!}"
                >
                    {!! $document->getText('homepage.buttonText') !!}
                </a>
            </div>
        </section>

        <?php $slices = $document->getSliceZone('homepage.body')->getSlices(); ?>
        @foreach ($slices as $slice)
            @switch($slice->getSliceType())
                @case('highlight_section')
                    @include('partials.slices.highlight-section', ['slice' => $slice])
                    @break
                @case('banner')
                    @include('partials.slices.banner', ['slice' => $slice])
                    @break
                @case('banner_look')
                    @include('partials.slices.quote-banner', ['slice' => $slice])
                    @break
                @case('editorial_look')
                    @include('partials.slices.featured-section', ['slice' => $slice])
                    @break
                @case('text_section')
                    @include('partials.slices.text-section', ['slice' => $slice])
                    @break
                @case('image_slider')
                    @include('partials.slices.image-slider', ['slice' => $slice])
                    @break
                @case('gallery')
                    @include('partials.slices.gallery', ['slice' => $slice])
                    @break
                 @case('video')
                    @include('partials.slices.video', ['slice' => $slice])
                    @break
            @endswitch
        @endforeach

    </div>

@stop
