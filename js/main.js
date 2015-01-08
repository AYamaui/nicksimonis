$(function(){
	'use strict';
	
	//$('nav, .slider_next, .slider_prev').delay(3000).fadeOut();
	
	$(document).mousemove(function(){
		//$('nav, .slider_next, .slider_prev').show();
		//$('nav, .slider_next, .slider_prev').delay(3000).fadeOut();
	});
	
	// -------------------------------------------------------------------------
	// Default & common values. Used to cache selectors and benefit consistency.
	// -------------------------------------------------------------------------
	
	var swiper,
			height = $(window).height(),
			modal = false,
			currentlyOpen = false,
			currentRel = false;
			
	var swiperContainer = $('.swiper-container'),
			swiperSlide,
			swiperNext = $('.slider_next'),
			swiperPrev = $('.slider_prev'),
			mainNavLinks = $('nav.main a'),	
			logo = $('.logo_link'),
			serie = $('.category'),
			theBody = $('body');
			
	var baseURL = 'http://joeyvo.me/nicksimonis/images/', // TODO: Change
			priorities = {
				immediate: 0,
				high: 1,
				medium: 2,
				low: 3
			},
			currentP = 0,
			
			// Use JSON for image load list
			
			images = [
				[priorities.immediate, 'logo_frame.png'],
				[priorities.immediate, 'logo_arrow.png'],
				[priorities.immediate, 'photos/field4.jpg'],
				[priorities.high, 'photos/field.jpg'],
				[priorities.high, 'photos/field2.jpg'],
				[priorities.high, 'photos/field3.jpg'],
				[priorities.high, 'photos/beach.jpg'],
				[priorities.high, 'photos/plane.jpg']
				/*[priorities.medium, 'beach.jpg'],
				[priorities.medium, 'plane.jpg'],
				[priorities.low, 'beach.jpg'],
				[priorities.low, 'plane.jpg']*/
			],
			pre = new Array(),
			loaded = new Array(),
			count = 0,
			start = 0;		
	
	// -----------------------------
	// Settings with default values.
	// -----------------------------
		
	var settings = {
		
	};
	
	// ---------------
	// Core functions. 
	// ---------------
	
	var preloader = {
		init: function(){
			
			//start = preloader.microtime(true);
			//console.log(preloader.microtime() + ': Start loading!');
					
			preloader.loadQueue();
			preloader.check();
			
		},
		
		loadQueue: function(){
			for(var i = 0; i < images.length; i++){ 
				if(currentP === images[i][0]){
					pre[i] = new Image();
					pre[i].src = baseURL + images[i][1];
					loaded[i] = false;
				}
			}
			currentP++;
			
			if(currentP > 4){
				// When all priority levels have been done
				return false;
			}
			
		},
		
		check: function(){
			
			if(count == pre.length){ 
				//console.log(preloader.microtime() + ': Done loading priority level: ' + currentP);
				//console.log('Duration: ' + (preloader.microtime(true) - start) + ' seconds');
				//start = preloader.microtime(true);
				
				if(currentP > priorities.immediate){
					$('.logo_con.supahfast').animate({top: '-100px'}, 500, 'easeInQuint', function(){
						$('.load_screen').fadeOut(300, function(){
							//$('.instructions').delay(800).fadeOut(500);
							
							/*$('body').mousemove(function(){
								$('.instructions').delay(800).fadeOut(500);	
							});*/
								
						});
					});
				}
				
				if(preloader.loadQueue() === false){
					// When all are done loading.
					return false;
				}
			}else{
				$('#loading').text('Loaded: ' + count);
			}
			
			for(var i = 0; i <= pre.length; i++){
				
				if(pre[i] != undefined && pre[i].complete == true && loaded[i] == false){
					// Check if image i is loaded
				}
				
				if(loaded[i] == false && pre[i].complete){
					loaded[i] = true;
					count++;
				}
			}
			var timerID = setTimeout(function(){ preloader.check() }, 10);
		},
		
		microtime: function(get_as_float){
			get_as_float = (get_as_float == undefined) ? false : get_as_float;
			var unixtime_ms = new Date().getTime();
    	var sec = parseInt(unixtime_ms / 1000);
    	return get_as_float ? (unixtime_ms / 1000) : (unixtime_ms - (sec * 1000))/1000 + ' ' + sec;
		}
	};
	
	var core = {
		
		init: function(){
			
			var mySwiper = swiperContainer.swiper({
				mode:'horizontal',
				loop: true,
				simulateTouch: false,
				onSlideChangeStart: function(s){
					$('.serie_card h1').text(s.getSlide(s.activeSlide + 1).data('title'));
					$('.serie_card p').text(s.getSlide(s.activeSlide + 1).data('description'));
					$('.serie_card a.cta').css('color', s.getSlide(s.activeSlide + 1).data('color'));
					$('.serie_card a.cta').css('borderColor', s.getSlide(s.activeSlide + 1).data('color'));
				}
			});
			
			swiperSlide = $('.swiper-slide'); // Cache on init, due to loading of Swiper
			swiperSlide.height(height);
			
			swiperNext.click(function(){
				mySwiper.swipeNext();
			});
			
			swiperPrev.click(function(){
				mySwiper.swipePrev();
			});
					
			mainNavLinks.click(function(){
		
				var rel = $(this).attr('rel');
				var page = $(document).find('.' + rel);
				
				if(!modal){
					page.fadeIn(400, 'easeInOutCubic');
					currentlyOpen = page;
					currentRel = rel;
					modal = true;
					swiperSlide.animate({'opacity': .2});

					$('.serie_card').fadeOut(400, 'easeInOutCubic');
				}else{
					if(currentRel !== rel){
						currentlyOpen.fadeOut(400, 'easeInOutCubic');
						page.fadeIn(400, 'easeInOutCubic');
						currentlyOpen = page;
						currentRel = rel;
					}else{
						page.fadeOut(400, 'easeInOutCubic');	
						modal = false;
						swiperSlide.animate({'opacity': 1});
						$('.serie_card').fadeIn(400, 'easeInOutCubic');
					}
				}
			});
			
			logo.click(function(){
				if(currentlyOpen !== false){
					currentlyOpen.fadeOut(400, 'easeInOutCubic');	
					currentlyOpen = false;
					modal = false;
					swiperSlide.animate({'opacity': 1});
				}
			});
			
			serie.click(function(){
				var rel = $(this).attr('rel');
				var page = $(document).find('.' + rel);
				currentlyOpen.fadeOut(400, 'easeInOutCubic');
				page.fadeIn(400, 'easeInOutCubic');
				currentlyOpen = page;
				currentRel = rel;
			});
			
			theBody.keydown(function(event) {
				if(event.which == '39'){
					mySwiper.swipeNext();
				}else if(event.which == '37'){
					mySwiper.swipePrev();
				}
			});
			
		}
		
	};
	

	preloader.init();
	core.init();
	
});