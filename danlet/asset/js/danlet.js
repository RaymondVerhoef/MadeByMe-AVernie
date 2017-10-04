(function($) {
	"use strict";
	//Click search
    //
	$('.search-header .fa-search').click(function(event) {
		$('.element-search').toggleClass('active');
	});

	//Menu mobile
    $("#danlet-mobile-menu button").click(function(){
        $(".mobile-menu .menu, #danlet-mobile-menu button,.sticker").toggleClass("show-menu-mobile");
        $("body").toggleClass("show-menu-mobile");
        $(".overlay-scale").toggleClass("open");
    });

    $("#danlet-mobile-menu .menu-item-has-children").click(function(){
        if ($('#danlet-mobile-menu .mobile-menu ul li').hasClass('menu-item-has-children')) {
          $(this).find('.sub-menu').toggleClass('active');
        };
    });

    $(".overlay-close").click(function(){
        $(".overlay-scale").removeClass("open");
    });

    var size_screen = screen.width;
    if (size_screen < 400) {
      $(".menu-item-has-children").prepend("<div class='arrow-menu'><i class='fa fa-angle-down'></i></div>");
    };

    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

    //Woo js
    //new WOW().init();

    //Lazy load
    $(document).ready(function() {
        setTimeout(function(){
            $('body').addClass('loaded');
        }, 1000);
        $("img")
            .lazyload({
                 event: "lazyload",
                 effect: "fadeIn",
                 effectspeed: 2000
               })
            .trigger("lazyload");
        $('#page_template').change(function() {
          if ($(this).val() == 'templates/template-choose-sidebar.php') {
            $('#_beautheme_sidebar').show('slow');
          }else{
            $('#_beautheme_sidebar').hide('fast');
          }
        });
    });
    $(document).on('click', '[data-header-cart="remove_item_wcm"]' ,function(e) {
        e.preventDefault();
        var id = $(this).attr('data-product');
        var data ={
            'action': 'danlet_remove_item_cart',
            'id': id,
        };
        jQuery.post(ajax_obj.url, data, function(response) {
             $('.acd_number_on_cart').parent('.acd-cart').html(response);
        });
        return false;
    });

	// Clearfix
	$('[data-css="true"]').each(function () {
        var rowID = $(this).attr('id');
        var data = $(this).attr('data-css-value');
        var data_de = data;
        $( "<style id='custom_css_"+rowID+"'>"+ data_de +"</style>" ).appendTo( "head" );
    });
})(jQuery);
