<!DOCTYPE html>
<html>
<head>
	<title>Nick Simonis - Photography</title>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>
	<link href='stylesheet.css' rel='stylesheet' type='text/css'>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<!--<script type="text/javascript" src="js/knob.js"></script>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<script type="text/javascript">
		
		var baseURL = 'http://symvo.li/nicksimonis/images/photos/',
				priorities = {
					immediate: 0,
					high: 1,
					medium: 2,
					low: 3
				},
				currentP = 0,
				
				// Use JSON for image load list
				
				images = [
					[priorities.immediate, 'field.jpg'],
					[priorities.immediate, 'field2.jpg'],
					[priorities.immediate, 'field3.jpg'],
					[priorities.immediate, 'field4.jpg'],
					[priorities.high, 'beach.jpg'],
					[priorities.high, 'plane.jpg'],
					[priorities.medium, 'beach.jpg'],
					[priorities.medium, 'plane.jpg'],
					[priorities.low, 'beach.jpg'],
					[priorities.low, 'plane.jpg']
				],
				pre = new Array(),
				loaded = new Array(),
				count = 0,
				start = 0;
				
		var preloader = {
			init: function(){
				
				//start = preloader.microtime(true);
				//console.log(preloader.microtime() + ': Start loading!');
						
				preloader.loadQueue();
				preloader.check();
				
			},
			
			loadQueue: function(){
				for(i = 0; i < images.length; i++){ 
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
						$('#loading').text('Done!');
					}
					
					if(preloader.loadQueue() === false){
						// When all are done loading.
						return false;
					}
				}else{
					$('#loading').text('Loaded: ' + count);
				}
				
				for(i = 0; i <= pre.length; i++){
					
					if(pre[i] != undefined && pre[i].complete == true && loaded[i] == false){
						// Check if image i is loaded
					}
					
					if(loaded[i] == false && pre[i].complete){
						loaded[i] = true;
						count++;
					}
				}
				timerID = setTimeout("preloader.check()", 10);
			},
			
			microtime: function(get_as_float){
				get_as_float = (get_as_float == undefined) ? false : get_as_float;
				var unixtime_ms = new Date().getTime();
	    	var sec = parseInt(unixtime_ms / 1000);
	    	return get_as_float ? (unixtime_ms / 1000) : (unixtime_ms - (sec * 1000))/1000 + ' ' + sec;
			}
		};
		
		preloader.init();

	</script>
</head>

<body>

	<div class="load_screen">
		<div class="logo_con supahfast">
			<div class="logo_arrow supahfast"></div>
		</div>
	</div>
	<!--
	<div class="instructions">
		<p>Hover over logo for menu or use arrow keys to navigate.</p>
	</div>
	-->

	<div class="slider_prev"><img src="images/arrow_left.png" /></div>
	<div class="slider_next"><img src="images/arrow_right.png" /></div>

	<header>
		<nav class="main">
			<a href="#" alt="Nick Simonis" class="logo">
				<div class="logo_con">
					<div class="logo_arrow"></div>
				</div>
			</a>
		
			<a href="#" class="profile" title="Profile" rel="profile">
				About
			</a>
		</nav>
	</header>
	
	<!--
	<nav class="social">
		<ul>
			<li><a href="#" title="Facebook" class="facebook">Facebook</a></li>
			<li><a href="#" title="Flickr" class="flickr">Flickr</a></li>
		</ul>
	</nav>
	-->

	<div class="overlay_big"></div>

	<div class="serie_card">
		<!-- <a href="#" alt="Nick Simonis" class="logo_link">
			<div class="logo_con">
				<div class="logo_arrow"></div>
			</div>
		</a> -->
		<h1>Serie title</h1>
		<p>I should be incapable of drawing a single stroke at the present moment.</p>
		<a href="#" class="cta">Explore now</a>
	</div>
	
	<div class="swiper-container">
		<div class="swiper-wrapper">
				<div class="swiper-slide" data-color="#ffcc00" data-title="Roots" data-description="I am Nick Simonis. I am from a small island just off the coast of Venezuela, called Curaçao." style="background: url(images/photos/field4.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">Roots</h1></div>
				<div class="swiper-slide" data-color="#ccff00" data-title="Desire Lines" data-description="I am currently living in the Netherlands and try to find some new places to explore from time to time." style="background: url(images/photos/plane.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">Desire Lines</h1></div>
				<div class="swiper-slide" data-color="#00ccff" data-title="Camouflage" data-description="Photography to me is a means of expression, just one of many ways of telling a story and my personal favorite." style="background: url(images/photos/field.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">Camouflage</h1></div>
				<div class="swiper-slide" data-color="#ff00cc" data-title="Serie 4" data-description="Description here" style="background: url(images/photos/beach.jpg) center no-repeat; background-size: cover;"><h1 class="image-title">Serie 4</h1></div>
		</div>
	</div>
	
	<section class="modal profile">
		<p>
			<img src="images/profile.jpg" class="profile_picture" />
			<h1>Nick Simonis</h1>
		</p>
		
		<img src="images/world.png" />

		<p>I am Nick Simonis. I am from a small island just off the coast of Venezuela, called Curaçao. I am currently living in the Netherlands and try to find some new places to explore from time to time. Photography to me is a means of expression, just one of many ways of telling a story and my personal favorite.</p>
		
		<p>I am a hunter of light and an observer of time. Nature is my inspiration and understanding is my pursuit. I attempt to tell stories on behalf of my subjects. My approach is to explore the essence of a statement before bringing the visual elements together to compose the narrative. I am always looking for new stories, both as a teller and a listener.</p>
	</section>
	
	<section class="modal series">
		<ul class="series_list">
			<li>
				<a href="#" class="category" rel="landscape">
					<img src="http://placehold.it/300x150/fff" width="300" height="150" style="background: white;" />
					<h2>North &amp; South<span class="year">2013</span></h2>
					<p>I should be incapable of drawing a single stroke at the present moment.</p>
				</a>
			</li>
			<li>
				<a href="#" class="category" rel="portrait">
					<img src="http://placehold.it/300x150/fff" width="300" height="150" style="background: white;" />
					<h2>Roots<span class="year">2013</span></h2>
					<p>I should be incapable of drawing a single stroke at the present moment.</p>
				</a>
			</li>
			<li>
				<a href="#" class="category" rel="portrait">
					<img src="http://placehold.it/300x150/fff" width="300" height="150" style="background: white;" />
					<h2>Home<span class="year">2012</span></h2>
					<p>I should be incapable of drawing a single stroke at the present moment.</p>
				</a>
			</li>
		</ul>
	</section>
	
	<section class="modal contact">
		<p>I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>
		
		<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty</p>
	</section>
	
	<section class="gallery landscape">
		<ul>
			<li>
				<a href="#">
					<img src="http://placehold.it/160x100/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/120x160/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/160x100/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/120x160/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/160x100/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/120x160/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/160x100/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/120x160/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/160x100/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/120x160/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/160x100/fff" />
				</a>
			</li>
			<li>
				<a href="#">
					<img src="http://placehold.it/120x160/fff" />
				</a>
			</li>
		</ul>
	</section>
	
	<footer class="clearfix">
		<div class="right">
			<img class="right" src="images/cc.png" alt="Creative Commons License" style="margin-top: 5px;margin-left: 15px;" />
			<p class="right">&copy; 2014 Nick Simonis</p>
		</div>

		<div class="left" style="margin-left: -18px;">
			<ul class="sm_links">
				<li>
					<a href="#" class="icon-social">&#62217;</a>
				</li>
				<li>
					<a href="#" class="icon-social">&#62214;</a>
				</li>
				<li>
					<a href="#" class="icon-social">&#62211;</a>
				</li>
				<li>
					<a href="#" class="icon-social">&#62232;</a>
				</li>
				<li>
					<a href="#" class="mail">Mail me</a>
				</li>
			</ul>
		</div>
	</footer>
	 
</body>

</html>