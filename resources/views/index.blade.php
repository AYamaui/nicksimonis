@extends('app')
@section('content')
<div class="swiper-container series-list">
    <div class="swiper-wrapper">
        @foreach($series as $serie)
        <div style="background: url({{$serie->original_source}}) center no-repeat; background-size: cover;" class="swiper-slide">
            <a href="#" class="serie" data-id="{{$serie->id}}">
                <h1 class="image-title">{{$serie->title}}</h1>
                <p class="image-description" style="display: none;">{{$serie->description}}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>
@foreach($series as $serie)
<div class="swiper-container photos-list photos-{{$serie->id}}" data-id="{{$serie->id}}" style="display: none;">
    <div class="swiper-wrapper">
        @foreach($serie->photos as $photo)
        <div class="swiper-slide" style="background: url({{$photo->original_source}}) center no-repeat; background-size: cover;">
            <a href="#">
                <h1 class="image-title">{{$photo->title}}</h1>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endforeach
<script>
    var images = [
            @foreach($series as $serie)
            '{{$serie->original_source}}',
            @foreach($serie->photos as $photo)
            '{{$photo->original_source}}',
            @endforeach
            @endforeach
    ]
</script>
@stop