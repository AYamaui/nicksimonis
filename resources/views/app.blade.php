<!DOCTYPE html>
<html>
    <head>
        <title>Nick Simonis - Photography</title>

        {!!HTML::style("http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700")!!}
        {!!HTML::style("http://fonts.googleapis.com/css?family=Cardo")!!}
        {!!HTML::style("stylesheets/stylesheet.css")!!}

        {!!HTML::script("js/jquery.js")!!}

        {!!HTML::script("js/jqueryui.js")!!}

        {!!HTML::script("js/slider.js")!!}
        {!!HTML::script("js/main.js")!!}
    </head>
    <body>
        <div class="load_screen">
            <div class="logo_con supahfast">
                <div class="logo_arrow supahfast"></div>
            </div>
        </div>
        <div class="slider_prev"><img src="{{url('images/arrow_left.png')}}" /></div>
        <div class="slider_next"><img src="{{url('images/arrow_right.png')}}" /></div>
        <header>
            <nav class="main">
                <div class="menu">
                    <a href="{{url('')}}" class="logo">
                        <div class="logo_con">
                            <div class="logo_arrow"></div>
                        </div>	
                    </a>
                    <ul class="options">
                        <li>
                            {!!HTML::link('','Series',['title'=>'Series','rel'=>'series'])!!}
                        </li>
                        <li>
                            <a href="#" class="modal_link" title="Profile" rel="profile">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="modal_link" title="Contact" rel="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
        <section class="modal profile">
            <div class="profile_container">
                <img src="{{url('images/profile.jpg')}}" class="profile_picture" />
                <h1>Nick Simonis</h1>
                <img src="{{url('images/world.png')}}" />
                <p>I am Nick Simonis. I am from a small island just off the coast of Venezuela, called Curaçao. I am currently living in the Netherlands and try to find some new places to explore from time to time. Photography to me is a means of expression, just one of many ways of telling a story and my personal favorite.</p>
                <p>I am a hunter of light and an observer of time. Nature is my inspiration and understanding is my pursuit. I attempt to tell stories on behalf of my subjects. My approach is to explore the essence of a statement before bringing the visual elements together to compose the narrative. I am always looking for new stories, both as a teller and a listener.</p>
            </div>
        </section>

        <section class="modal contact">
            <div class="contact_info">
                <p>nick@nicksimonis.co</p>
                <p>+31616767067</p>
                <ul class="sm_links">
                    <li>
                        <a href="https://www.facebook.com/pages/Nick-Simonis-Photography" title="facebook" class="icon-social icon-facebook"></a>
                    </li>
                    <li>
                        <a href="http://instagram.com/nicksimonis" title="instagram" class="icon-social icon-instagram"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/nicksimonis" class="icon-social icon-twitter" title="twitter"></a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/nicksimonis" class="icon-social icon-linkedin" title="linkedin"></a>
                    </li>
                </ul>
            </div>

            <div class="contact_form">
                <label class="form_label">Email</label>
                <input id="email" type="text" placeholder="Email">
                <label class="form_label">Subject</label>
                <input id="subject" type="text" placeholder="Subject">
                <label class="form_label">Message</label>
                <textarea id="content" rows="5"></textarea>
            </div>
        </section>
        <footer class="clearfix">
            <div class="right">
                <img class="right" src="{{url('images/cc.png')}}" alt="Creative Commons License" style="margin-top: 5px;margin-left: 15px;" />
                <p class="right">&copy; 2014 Nick Simonis</p>
            </div>

            <div class="left" style="margin-left: -18px;">
                <ul class="sm_links">
                    <li>
                        <a href="https://twitter.com/nicksimonis" class="icon-social icon-twitter" title="twitter"></a>
                    </li>
                    <li>
                        <a href="#" class="icon-social icon-vimeo" title="vimeo"></a>
                    </li>
                    <li>
                        <a href="#" class="icon-social icon-flickr" title="flickr"></a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/nicksimonis" class="icon-social icon-linkedin" title="linkedin"></a>
                    </li>
                    <a href="#" class="mail">Mail me</a>
                </ul>
            </div>
        </footer>
    </body>
</html>
