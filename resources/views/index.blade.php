@extends('app')
@section('content')
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($series as $serie)
        <div class="swiper-slide" data-title="{{$serie->title}}" data-description="{{$serie->description}}" style="background: url({{$serie->original_source}}) center no-repeat; background-size: cover;"><h1 class="image-title">{!!HTML::link('photos/'.$serie->id,$serie->title) !!}</h1></div>
        @endforeach
    </div>
</div>
@stop