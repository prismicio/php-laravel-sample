@extends('layouts.app')

@section('content')

    <div data-wio-id="{!! $document->id !!}">

        @foreach ($document->data->body as $slice)
            @switch ($slice->slice_type)
                @case ('highlight_section')
                    @include('partials.slices.highlight-section', ['slice' => $slice])
                    @break
                @case ('banner')
                    @include('partials.slices.banner', ['slice' => $slice])
                    @break
                @case ('banner_look')
                    @include('partials.slices.quote-banner', ['slice' => $slice])
                    @break
                @case ('editorial_look')
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
