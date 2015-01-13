@extends('app')
@section('content')
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide" data-color="#ffcc00" data-title="Roots" data-description="I am Nick Simonis. I am from a small island just off the coast of Venezuela, called Curaçao." style="background: url(images/photos/field4.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">{!!HTML::link('series','Roots') !!}</h1></div>
        <div class="swiper-slide" data-color="#ccff00" data-title="Desire Lines" data-description="I am currently living in the Netherlands and try to find some new places to explore from time to time." style="background: url(images/photos/plane.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">{!!HTML::link('series','Desire Lines') !!}</h1></div>
        <div class="swiper-slide" data-color="#00ccff" data-title="Camouflage" data-description="Photography to me is a means of expression, just one of many ways of telling a story and my personal favorite." style="background: url(images/photos/field.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">{!!HTML::link('series','Camouflage') !!}</h1></div>
        <div class="swiper-slide" data-color="#ff00cc" data-title="Serie 4" data-description="Description here" style="background: url(images/photos/beach.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">{!!HTML::link('series','Serie 4') !!}</h1></div>
    </div>
</div>
@stop