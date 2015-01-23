@extends('app')
@section('content')
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($series as $serie)
        <div class="swiper-slide serie" data-title="{{$serie->title}}" data-description="{{$serie->description}}" style="background: url({{$serie->original_source}}) center no-repeat; background-size: cover;"><h1 class="image-title">{!!HTML::link('photos/'.$serie->id,$serie->title) !!}</h1></div>
        @foreach($serie->photos as $photo)
        <div class="swiper-slide series-photos photos-{{$serie->id}}" data-title="{{$photo->title}}" style="background: url({{$photo->original_source}}) center no-repeat; background-size: cover;"><h1 class="image-title">{{$photo->title}}</h1></div>
        @endforeach
        @endforeach
    </div>
</div>
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