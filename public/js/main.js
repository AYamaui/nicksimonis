$(function () {
    'use strict';

    // -------------------------------------------------------------------------
    // Default & common values. Used to cache selectors and benefit consistency.
    // -------------------------------------------------------------------------

    var height = $(window).height(),
            modal = false,
            currentlyOpen = false,
            currentRel = false;

    var swiperContainer = $('.swiper-container'),
            swiperSlide,
            mainNavLinks = $('nav.main a.modal_link'),
            logo = $('.logo_link'),
            theBody = $('body'),
            modalBackdrop = $('.modal');

    var pre = new Array(),
            loaded = new Array(),
            count = 0;

    // ---------------
    // Core functions. 
    // ---------------

    var preloader = {
        init: function () {
            preloader.loadQueue();
            preloader.check();
        },
        loadQueue: function () {
            for (var i = 0; i < images.length; i++) {
                pre[i] = new Image();
                pre[i].src = images[i];
                loaded[i] = false;
            }
        },
        check: function () {
            if (count == pre.length) {
                $('.logo_con.supahfast').animate({top: '-100px'}, 500, 'easeInQuint', function () {
                    $('.load_screen').fadeOut(300, function () {

                    });
                });
                return false;
            }

            for (var i = 0; i <= pre.length; i++) {
                if (loaded[i] == false && pre[i].complete) {
                    loaded[i] = true;
                    count++;
                }
            }
            setTimeout(function () {
                preloader.check();
            }, 10);
        }
    };

    var core = {
        init: function () {
            //hide all photos of series..
            $('.series-photos').addClass('hidden');
            var mySwiper = swiperContainer.swiper({
                mode: 'horizontal',
                loop: true,
                simulateTouch: true,
                keyboardControl: true,
                mousewheelControl: true,
                onSlideChangeStart: function (data) {
                    var activeSlide = data.getSlide(data.activeSlide);
                    console.log($(activeSlide).hasClass('hidden'));

                }
            });

            swiperSlide = $('.swiper-slide'); // Cache on init, due to loading of Swiper
            swiperSlide.height(height);

            $('.slider_next').click(function () {
                mySwiper.swipeNext();
            });

            $('.slider_prev').click(function () {
                mySwiper.swipePrev();
            });

            swiperContainer.click(function () {
                if (modal) {
                    modalBackdrop.fadeOut(400, 'easeInOutCubic');
                    swiperSlide.animate({'opacity': 1});
                    $('.image-title').show();
                    modal = false;
                }
            });

            mainNavLinks.click(function () {

                var rel = $(this).attr('rel');
                var page = $(document).find('.' + rel);

                if (!modal) {
                    page.fadeIn(400, 'easeInOutCubic');
                    currentlyOpen = page;
                    currentRel = rel;
                    modal = true;
                    swiperSlide.animate({'opacity': .2});
                    $('.image-title').hide();
                    $('.serie_card').fadeOut(400, 'easeInOutCubic');
                } else {
                    $('.image-title').show();
                    if (currentRel !== rel) {
                        currentlyOpen.fadeOut(400, 'easeInOutCubic');
                        page.fadeIn(400, 'easeInOutCubic');
                        currentlyOpen = page;
                        currentRel = rel;
                    } else {
                        page.fadeOut(400, 'easeInOutCubic');
                        modal = false;
                        swiperSlide.animate({'opacity': 1});
                        $('.serie_card').fadeIn(400, 'easeInOutCubic');
                    }
                }
            });

            $('.mail').click(function () {
                var rel = 'contact';
                var page = $('.contact');

                if (!modal) {
                    page.fadeIn(400, 'easeInOutCubic');
                    currentlyOpen = page;
                    currentRel = rel;
                    modal = true;
                    swiperSlide.animate({'opacity': .2});
                    $('.image-title').hide();
                    $('.serie_card').fadeOut(400, 'easeInOutCubic');
                } else {
                    $('.image-title').show();
                    if (currentRel !== rel) {
                        currentlyOpen.fadeOut(400, 'easeInOutCubic');
                        page.fadeIn(400, 'easeInOutCubic');
                        currentlyOpen = page;
                        currentRel = rel;
                    } else {
                        page.fadeOut(400, 'easeInOutCubic');
                        modal = false;
                        swiperSlide.animate({'opacity': 1});
                        $('.serie_card').fadeIn(400, 'easeInOutCubic');
                    }
                }
            });

            logo.click(function () {
                if (currentlyOpen !== false) {
                    currentlyOpen.fadeOut(400, 'easeInOutCubic');
                    currentlyOpen = false;
                    modal = false;
                    swiperSlide.animate({'opacity': 1});
                    $('.image-title').show();
                }
            });

            $('.category').click(function () {
                var rel = $(this).attr('rel');
                var page = $(document).find('.' + rel);
                currentlyOpen.fadeOut(400, 'easeInOutCubic');
                page.fadeIn(400, 'easeInOutCubic');
                currentlyOpen = page;
                currentRel = rel;
            });
        }
    };

    // Calsulates dynamically the max height for the profile container
    var max = height * 0.95;
    $('.profile').css('max-height', max);
    $('.profile_container').css('max-height', max - 5);

    preloader.init();
    core.init();
    // Send mail
    $('#send_message').click(function (evt) {
        $(evt.target).html("Sending Message..");
        var inputs = {
            email: $("#email").val(),
            subject: $("#subject").val(),
            message: $("#message").val(),
            _token: $("#_token").val()
        };
        $.ajax({
            type: "POST",
            url: baseUrl + "contact",
            data: inputs,
            dataType: "json",
            success: function (data) {
                $('#contact_form').html("<h3>" + data.message + "</h3>")
            },
            error: function (data) {
                var errors = "";
                $.each(data.responseJSON, function (obj, message) {
                    errors += message[0] + "\n";
                });
                alert(errors);
                $(evt.target()).html("Send Message");
            }
        });
    });
});