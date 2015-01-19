@extends('app')
@section('content')
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($photos as $photo)
        <div class="swiper-slide" data-title="{{$photo->title}}" style="background: url({{$photo->original_source}}) center no-repeat; background-size: cover;"><h1 class="image-title">{{$photo->title}}</h1></div>
        @endforeach
    </div>
</div>
<script>
    var images = [
            @foreach($photos as $photo)
            '{{$photo->original_source}}',
            @endforeach
    ]
</script>
@stop