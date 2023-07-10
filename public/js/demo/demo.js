// ------------------------------------------------
// Project Name: Ackley - Coming Soon and Landing Page Template
// Project Description: Ackley - bold and clean coming soon and landing page template to kick-start your project
// Tags: mix_design, coming soon, under construction, template, landing page, portfolio, one page, responsive, html5, css3, creative, clean, agency, personal page
// Version: 1.0.0
// Build Date: June 2023
// Last Update: June 2023
// This product is available exclusively on Themeforest
// Author: mix_design
// Author URI: https://themeforest.net/user/mix_design
// File name: demo.js
// ------------------------------------------------

// ------------------------------------------------
// Table of Contents
// ------------------------------------------------
//
//  1. Loader
//  2. Background-attachment: fixed Solution for IE
//  3. SVG Fallback
//  4. Chrome Smooth Scroll
//  5. Images Moving Ban
//  6. Fullscreen Layout
//  7. Cursor
//  8. Smooth Scroll To Top
//  9. Smooth Scroll To Section
//
// ------------------------------------------------
// Table of Contents End
// ------------------------------------------------

$(window).on("load", function() {

  "use strict";

  // --------------------------------------------- //
  // Loader Start
  // --------------------------------------------- //
  $(".loader__circle").addClass('fade');

  setTimeout(function(){
    $(".loader").addClass('loaded');
  }, 300);
  // --------------------------------------------- //
  // Loader End
  // --------------------------------------------- //

});

$(function() {

  "use strict";

  // ----------------------------------------------- //
  // Background-attachment: fixed Solution for IE Start
  // ----------------------------------------------- //
  if(navigator.userAgent.match(/Trident\/7\./)) {
    $('body').on("mousewheel", function () {
        event.preventDefault();

        var wheelDelta = event.wheelDelta;

        var currentScrollPosition = window.pageYOffset;
        window.scrollTo(0, currentScrollPosition - wheelDelta);
    });

    $('body').keydown(function (e) {
          e.preventDefault(); // prevent the default action (scroll / move caret)
          var currentScrollPosition = window.pageYOffset;

          switch (e.which) {

              case 38: // up
                  window.scrollTo(0, currentScrollPosition - 120);
                  break;

              case 40: // down
                  window.scrollTo(0, currentScrollPosition + 120);
                  break;

              default: return; // exit this handler for other keys
          }
      });
  }
  // --------------------------------------------- //
  // Background-attachment: fixed Solution for IE End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // SVG Fallback Start
  // --------------------------------------------- //
  if(!Modernizr.svg) {
    $("img[src*='svg']").attr("src", function() {
      return $(this).attr("src").replace(".svg", ".png");
    });
  };
  // --------------------------------------------- //
  // SVG Fallback End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // Chrome Smooth Scroll Start
  // --------------------------------------------- //
  try {
    $.browserSelector();
    if($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch(err) {
  };
  // --------------------------------------------- //
  // Chrome Smooth Scroll End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // Images Moving Ban Start
  // --------------------------------------------- //
  $("img, a").on("dragstart", function(event) { event.preventDefault(); });
  // --------------------------------------------- //
  // Images Moving Ban End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // Fullscreen Layout Start
  // --------------------------------------------- //
  function fullscreenLayout() {
    $(".fullscreen").css({
        height: $(window).height()
    });
  };
  fullscreenLayout();
  $(window).resize(function(){
    fullscreenLayout();
  });
  // --------------------------------------------- //
  // Fullscreen Layout End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // Cursor Start
  // --------------------------------------------- //
  function followCursor() {
    var cursor = $('.cursor');
    // follow effect
    function moveCursor(e) {
	    var t = e.clientX + "px",
          n = e.clientY + "px";
      var circleCursor = anime({
        targets: '.cursor',
        duration: 30,
        left: t,
        top: n,
        easing: 'linear'
      });
    }
    $(window).on('mousemove', moveCursor);
    // line link hover
    $('.link-s').on('mouseenter', function() {
      cursor.addClass('cursor-s');
    });
    $('.link-s').on('mouseleave', function() {
      cursor.removeClass('cursor-s');
    });
    // buttons & triggers hover
    $('.link-m').on('mouseenter', function() {
      cursor.addClass('cursor-m');
    });
    $('.link-m').on('mouseleave', function() {
      cursor.removeClass('cursor-m');
    });
    // buttons & triggers opposite hover
    $('.link-m-opposite').on('mouseenter', function() {
      cursor.addClass('cursor-m-opposite');
    });
    $('.link-m-opposite').on('mouseleave', function() {
      cursor.removeClass('cursor-m-opposite');
    });
    // controls hover
    $('.link-l').on('mouseenter', function() {
      cursor.addClass('cursor-l');
    });
    $('.link-l').on('mouseleave', function() {
      cursor.removeClass('cursor-l');
    });
    // controls oppisite hover
    $('.link-l-opposite').on('mouseenter', function() {
      cursor.addClass('cursor-l-opposite');
    });
    $('.link-l-opposite').on('mouseleave', function() {
      cursor.removeClass('cursor-l-opposite');
    });
    // controls arrow hover
    $('.link-l-arrow').on('mouseenter', function() {
      cursor.addClass('cursor-l-arrow');
    });
    $('.link-l-arrow').on('mouseleave', function() {
      cursor.removeClass('cursor-l-arrow');
    });
    // XL controls hover
    $('.link-xl').on('mouseenter', function() {
      cursor.addClass('cursor-xl');
    });
    $('.link-xl').on('mouseleave', function() {
      cursor.removeClass('cursor-xl');
    });
    // XL opposite controls hover
    $('.link-xl-opposite').on('mouseenter', function() {
      cursor.addClass('cursor-xl-opposite');
    });
    $('.link-xl-opposite').on('mouseleave', function() {
      cursor.removeClass('cursor-xl-opposite');
    });
  };
  // init
  followCursor();
  // --------------------------------------------- //
  // Cursor End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // Smooth Scroll To Top Start
  // --------------------------------------------- //
  var offset = 300,
      offset_opacity = 1200,
      scroll_top_duration = 500,
      $back_to_top = $('.to-top');

	$(window).on('scroll', function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('is-visible') : $back_to_top.removeClass('is-visible fade-out');
		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('fade-out');
		}
	});

	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
  // --------------------------------------------- //
  // Smooth Scroll To Top End
  // --------------------------------------------- //

  // --------------------------------------------- //
  // Smooth Scroll To Section Start
  // --------------------------------------------- //
  var scrollToPreview = $('.scroll-to-preview');

  scrollToPreview.on('click', function(event){
    event.preventDefault();
    smoothScroll($(this.hash));
  });

  function smoothScroll(target){
    $('body,html').animate({
      scrollTop: target.offset().top,
    }, 500);
  };
  // --------------------------------------------- //
  // Smooth Scroll To Section End
  // --------------------------------------------- //

});
