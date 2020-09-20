        $(document).ready(function() {
            // ************************1. Swiper******************************/
            swiper = new Swiper('.swiper-container', {
                navigation: {
                    nextEl: '.swiper-next',
                    prevEl: '.swiper-prev',
                },
                allowTouchMove: false,

            });

            // ************************2.Mobile Menu******************************/

            $('.menu-bars').click(function() {
                $('.universal-overlay').show();
                $('.menu').show("slide", {
                    direction: "left"
                }, 500);
            });
            $('.menu-close, .universal-overlay').click(function() {
                $('.menu').hide("slide", {
                    direction: "left"
                }, 500);
                $('.universal-overlay').hide();
            });


            //************5.Mobile on scroll functionality****************/

            if ($(window).width() <= 900) {
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();

                    if (scroll >= 145) {
                        $('.hide-on-scroll-phone').fadeOut();
                        $('.show-on-scroll-phone').fadeIn();
                    }
                    if (scroll <= 145) {
                        $('.hide-on-scroll-phone').fadeIn();
                        $('.show-on-scroll-phone').fadeOut();
                    }
                });
            }

            // *************************************************************************/
            // ***********6. Desktop Navigation Next and background
            // *************************************************************************/

            //  back button on slide 4 (Form)
            $('.back-slide-3').click(function() {
                $('.filter-box').removeClass('filter-box-resize-width ');
                $('#slide-4').removeClass('filter-box-resize-width');
                $('.slides').css('scroll-behavior', 'smooth');
                $('.hero-content').show();
                $('.hide-on-desktop').hide();
                $('.desktop-overlay').removeClass('slider-overlay');
            });

            $('.not-decided-button').on('click', function() {
                $('#event_dates').val('');
            });

            // 9.Date Picker*************/
            // $('#datepicker-2').multiDatesPicker({
            //     inline: true,
            //     altField: '#text-2',
            //     dateFormat: 'dd/mm/yy',
            //     minDate: +1,
            //     onSelect: function(dateText, inst) {
            //         $('.action-footer-mobile .swiper-next').show().addClass('third-slide-next-but');
            //         $('.action-footer-mobile .third-slide-next-but').off('click', get_vendor_count).on('click', get_vendor_count);

            //         if ($('#text-2').val().length === 0) {
            //             $('.action-footer-mobile .swiper-next').hide().removeClass('third-slide-next-but');
            //         }
            //         $('#event_dates').val($(this).multiDatesPicker('value'));
            //     },
            // });


            // $('#datepicker').multiDatesPicker({
            //     inline: true,
            //     altField: '#text',
            //     dateFormat: 'dd/mm/yy',
            //     minDate: +1,
            //     onSelect: function(dateText, inst) {
            //         $('.show-on-select').show();
            //         if ($('#text').val().length === 0) {
            //             $('.show-on-select').hide();
            //         }
            //         $('#event_dates').val($(this).multiDatesPicker('value'));
            //     },
            // });

            $('.input-options').on('click', function() {
                $($(this).data('field')).val($(this).data('option'));
            });

            $(document).ready(function() {
                $('td.ui-datepicker-today').removeClass("ui-datepicker-current-day ui-state-active");
            });
            // datepicker ends

            $('.swiper-next').on('click', function() {
                setTimeout(set_next_slide, 1)
            });

            function set_next_slide() {

                if ($('.slide-2').hasClass('swiper-slide-active')) {
                    $('.action-footer-mobile').show();
                    $('.swiper-prev').show();
                    $('.action-footer-mobile .swiper-next').hide();
                    $('.swiper-next').off('click', get_vendor_count);
                    $('.action-pink-fixed').html('Next <i class="fa right fa-angle-right"></i>');
                }

                if ($('.slide-3').hasClass('swiper-slide-active')) {
                    $('.swiper-prev').show();
                    $('.action-footer-mobile .swiper-next').hide();
                    $('.swiper-next').off('click', get_vendor_count).on('click', get_vendor_count);
                    $('.swiper-next').off('click', submit_form);
                    $('.action-pink-fixed').html('Submit <i class="fa right fa-angle-right"></i>').addClass('swiper-next').removeClass('get-detail-phone');
                    $('.action-footer-mobile .swiper-next').show().addClass('third-slide-next-but');
                    $('.action-footer-mobile .third-slide-next-but').off('click', get_vendor_count).on('click', get_vendor_count);
                    if ($('#text-2').val().length === 0) {
                        $('.action-footer-mobile .swiper-next').hide().removeClass('third-slide-next-but');
                    }

                }

                if ($('.slide-4').hasClass('swiper-slide-active')) {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    $('.action-footer-mobile .swiper-prev').hide();
                    $('.swiper-next').show();

                    $('.action-pink-fixed').html('See Planners').addClass('four-slide-next');
                    $('.four-slide-next').off('click', submit_form).on('click', submit_form);
                    $('.swiper-next').off('click', get_vendor_count);
                    $('.action-pink-fixed').addClass('get-detail-phone').removeClass('swiper-next');
                    // this is for menu bar/back arrow /bottom change settings
                    $('.menu-bars').hide();
                    $('.top-but').show();
                    $('.back-button-section, .change-settings-back').fadeIn();

                    // changing the text
                    $('.l-1').html('We have found');
                    $('.l-2').html('Lots of Wedding Planners');
                    $('.l-3').html('matching your requirements!');
                }
                set_tracking_classes();
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
            };

            // SLide previous
            $('.swiper-prev').click(function() {
                setTimeout(set_prev_slide, 1)
            });

            function set_prev_slide() {
                if ($('.slide-1').hasClass('swiper-slide-active')) {
                    $('.action-footer-mobile').hide();
                }
                if ($('.slide-2').hasClass('swiper-slide-active')) {
                    $('.swiper-prev').show();
                    $('.action-footer-mobile .swiper-next').hide();
                    $('.swiper-next').off('click', get_vendor_count);
                    $('.action-pink-fixed').html('Next <i class="fa right fa-angle-right"></i>');
                }
                if ($('.slide-3').hasClass('swiper-slide-active')) {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    $('.swiper-prev').show();
                    $('.action-pink-fixed').html('Submit <i class="fa right fa-angle-right"></i>').addClass('swiper-next').removeClass('get-detail-phone');
                    $('.action-footer-mobile .swiper-next').show().addClass('third-slide-next-but');
                    $('.action-footer-mobile .third-slide-next-but').off('click', get_vendor_count).on('click', get_vendor_count);
                    if ($('#text-2').val().length === 0) {
                        $('.action-footer-mobile .swiper-next').hide().removeClass('third-slide-next-but');
                    }
                    // this is for menu bar/back arrow /bottom change settings
                    $('.menu-bars').show();
                    $('.top-but').hide();
                    $('.back-button-section, .change-settings-back').fadeOut();
                    $('.swiper-next').off('click', get_vendor_count).on('click', get_vendor_count);
                    $('.swiper-next').off('click', submit_form);
                    $('.l-1').html('Find the perfect');
                    $('.l-2').html('WEDDING PLANNER');
                    $('.l-3').html('in Bangalore');
                }
                $('.four-slide-next').removeClass('four-slide-next');
                set_tracking_classes();
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
            };

            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                web_browser_back_support();
                setTimeout(function() {
                    $('.action-footer-mobile .swiper-prev').click()
                }, 1);
                window.history.pushState(null, "", window.location.href);
            };

            function set_tracking_classes() {
                if ($('.slide-1').hasClass('swiper-slide-active')) {
                    $('.swiper-next').addClass('vndr-ct-filtrflw-0-nxt-web').removeClass('vndr-ct-filtrflw-1-nxt-web');
                    $('.swiper-prev').addClass('vndr-ct-filtrflw-0-bck-web').removeClass('vndr-ct-filtrflw-1-bck-web');
                }
                if ($('.slide-2').hasClass('swiper-slide-active')) {
                    $('.swiper-next').addClass('vndr-ct-filtrflw-1-nxt-web').removeClass('vndr-ct-filtrflw-0-nxt-web').removeClass('vndr-ct-filtrflw-2-nxt-web');
                    $('.swiper-prev').addClass('vndr-ct-filtrflw-1-bck-web').removeClass('vndr-ct-filtrflw-0-bck-web').removeClass('vndr-ct-filtrflw-2-bck-web');
                }
                if ($('.slide-3').hasClass('swiper-slide-active')) {
                    $('.action-pink-fixed').removeClass('vndr-ct-filtrflw-lgn-web');
                    $('.swiper-next').addClass('vndr-ct-filtrflw-2-nxt-web').removeClass('vndr-ct-filtrflw-1-nxt-web').removeClass('vndr-ct-filtrflw-3-nxt-web');
                    $('.swiper-prev').addClass('vndr-ct-filtrflw-2-bck-web').removeClass('vndr-ct-filtrflw-1-bck-web').removeClass('vndr-ct-filtrflw-edtrqmt-web');
                }
                if ($('.slide-4').hasClass('swiper-slide-active')) {
                    $('.action-pink-fixed').addClass('vndr-ct-filtrflw-lgn-web').removeClass('vndr-ct-filtrflw-2-nxt-web').removeClass('th');
                    $('.swiper-prev').addClass('vndr-ct-filtrflw-edtrqmt-web').removeClass('vndr-ct-filtrflw-2-bck-web');
                }
            }

            $('input').focus(function() {
                $(this).siblings('label').addClass('label-focus');
            }).focusout(function() {
                if ($(this).val().length <= 0) {
                    $(this).siblings('label').removeClass('label-focus');
                }
            });

            // $(".jqueryform1").validate({
            //     errorElement: "span"
            // });
            // $(".jqueryform2").validate({
            //     errorElement: "span"
            // });

            $('input[name="number"]').keypress(function() {
                if (this.value.length >= 10) {
                    return false;
                }
            });
            // $('.jqueryform2 input[name="number"]').rules("add", {
            //     minlength: 10,
            //     maxlength: 10,
            //     phone: true,
            //     messages: {
            //         required: "Phone number is required",
            //         minlength: jQuery.validator.format("Minimum {0} characters are required"),
            //         maxlength: jQuery.validator.format("Maximum {0} characters are required")
            //     }
            // });
            // $('.jqueryform1 input[name="number"]').rules("add", {
            //     minlength: 10,
            //     maxlength: 10,
            //     phone: true,
            //     messages: {
            //         required: "Phone number is required",
            //         minlength: jQuery.validator.format("Minimum {0} characters are required"),
            //         maxlength: jQuery.validator.format("Maximum {0} characters are required")
            //     }
            // });

            // $('.jqueryform2 input[name="email"]').rules("add", {
            //     emailFormat: true,
            //     messages: {
            //         required: "Email is required"
            //     }
            // });
            // $('.jqueryform1 input[name="email"]').rules("add", {
            //     emailFormat: true,
            //     messages: {
            //         required: "Email is required"
            //     }
            // });

            // jQuery.validator.addMethod("emailFormat", function(value, element) {
            //     return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
            // }, 'Please enter a valid email address.');

            // jQuery.validator.addMethod("phone", function(value, element) {
            //     return this.optional(element) || /^[6-9][0-9]{9}$/.test(value);
            // }, 'Please enter a 10 digit mobile number.');

        });

        $('.next-one').click(function() {
            $('#slide-1').animate({
                opacity: 0.0,
                width: 0
            }, 80);
            $('#slide-1').removeClass('active');
            $('#slide-2').addClass('active');
        });
        $('.next-two').click(function() {
            $('#slide-2').animate({
                opacity: 0.0,
                width: 0
            }, 80);
            $('#slide-2').removeClass('active');
            $('#slide-3').addClass('active');
        });
        $('.next-three').click(function() {
            $('#slide-3').animate({
                opacity: 0.0,
                width: 0
            }, 80);
            $('#slide-4').animate({
                opacity: 1,
                width: 960
            }, 80);
            $('#slide-3').removeClass('active');
            $('#slide-4').addClass('active');
        });
        $('.back-one').click(function() {
            $('#slide-1').animate({
                opacity: 1,
                width: 480
            }, 80);
            $('#slide-1').addClass('active');
            $('#slide-2').removeClass('active');
        });
        $('.back-two').click(function() {
            $('#slide-2').animate({
                opacity: 1,
                width: 480
            }, 80);
            $('#slide-2').addClass('active');
            $('#slide-3').removeClass('active');
        });
        $('.back-three').click(function() {
            $('#slide-4').animate({
                opacity: 0.0,
                width: 0
            }, 80);
            $('#slide-3').animate({
                opacity: 1,
                width: 480
            }, 80);
            $('#slide-3').addClass('active');
            $('#slide-4').removeClass('active');
        });

        //  next button on slide 3 (calender)
        // $('.third-slide-next-but').click(get_vendor_count);

        //  submit button on slide 4 (Form)
        // $('.four-slide-next').click(submit_form);


        function web_browser_back_support() {
            if ($('#slide-2').hasClass('active')) {
                $('#slide-1').animate({
                    opacity: 1,
                    width: 480
                }, 80);
                $('#slide-1').addClass('active');
                $('#slide-2').removeClass('active');
            } else if ($('#slide-3').hasClass('active')) {
                $('#slide-2').animate({
                    opacity: 1,
                    width: 480
                }, 80);
                $('#slide-2').addClass('active');
                $('#slide-3').removeClass('active');
            } else if ($('#slide-4').hasClass('active')) {
                $('#slide-4').animate({
                    opacity: 0.0,
                    width: 0
                }, 80);
                $('#slide-3').animate({
                    opacity: 1,
                    width: 480
                }, 80);
                $('#slide-3').addClass('active');
                $('#slide-4').removeClass('active');
                $('.filter-box').removeClass('filter-box-resize-width ');
                $('#slide-4').removeClass('filter-box-resize-width');
                $('.slides').css('scroll-behavior', 'smooth');
                $('.hero-content').show();
                $('.hide-on-desktop').hide();
                $('.desktop-overlay').removeClass('slider-overlay');
            }
        }