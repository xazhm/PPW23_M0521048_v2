/*! ------------------------------------------------
 * Project Name: Ackley - Coming Soon and Landing Page Template
 * Project Description: Ackley - bold and clean coming soon and landing page template to kick-start your project
 * Tags: mix_design, coming soon, under construction, template, landing page, portfolio, one page, responsive, html5, css3, creative, clean, agency, personal page
 * Version: 1.0.0
 * Build Date: June 2023
 * Last Update: June 2023
 * This product is available exclusively on Themeforest
 * Author: mix_design
 * Author URI: https://themeforest.net/user/mix_design
 * File name: app.js
 * ------------------------------------------------

 * ------------------------------------------------
 * Table of Contents
 * ------------------------------------------------
 *
 *  1. SVG Fallback
 *  2. Chrome Smooth Scroll
 *  3. Images moving ban
 *  4. Detecting Mobile/Desktop
 *  5. Menu Hover Effect
 *  6. Cursor
 *  7. Menu & Sections Behavior
 *  8. Popup Open/Close
 *  9. Socials Mobile Open/Close
 *  10. PhotoSwipe Gallery Images Replace
 *
 * ------------------------------------------------
 * Table of Contents End
 * ------------------------------------------------ */

$(function() {

  "use strict";

  // SVG Fallback
  if(!Modernizr.svg) {
    $("img[src*='svg']").attr("src", function() {
      return $(this).attr("src").replace(".svg", ".png");
    });
  };

  // Chrome Smooth Scroll
  try {
    $.browserSelector();
    if($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch(err) {
  };

  // Images moving ban
  $("img, a").on("dragstart", function(event) { event.preventDefault(); });

  // Detecting Mobile/Desktop
  var isMobile = false;
  if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $('html').addClass('touch');
    isMobile = true;
  }
  else {
    $('html').addClass('no-touch');
    isMobile = false;
  }
  //IE, Edge
  var isIE = /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /MSIE 10/i.test(navigator.userAgent) || /Edge\/\d+/.test(navigator.userAgent);

  // Menu Hover Effect
  if ($('html').hasClass('no-touch')) {
    $('.navigation__link ').on('mouseenter', function() {
      $(this).next().addClass('is-visible');
      $(this).addClass('is-hidden');
    });
    $('.navigation__link ').on('mouseleave', function() {
      $(this).next().removeClass('is-visible');
      $(this).removeClass('is-hidden');
    });
  };

  // Cursor
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

  // Menu & Sections Behavior
  var menuTrigger        = $('#menu-trigger'),
      menuTriggerHead    = $('#menu-tigger-headline'),
      menu               = $('#menu'),
      header             = $('#header'),
      mainSection        = $('#main'),
      aboutSection       = $('#about'),
      worksSection       = $('#works'),
      contactSection     = $('#contact'),
      homeTrigger        = $('#home-trigger'),
      aboutTrigger       = $('#about-trigger'),
      worksTrigger       = $('#works-trigger'),
      contactTrigger     = $('#contact-trigger');

  menuTrigger.on('click', function(event){
    event.preventDefault();

    if (menu.hasClass('animate-in')) {
      menu.addClass('animate-out');

      setTimeout(function(){
        $('.active').addClass('animate-in');
        if ($('.main-fullscreen').hasClass('active')) {
          header.addClass('header-transparent');
        }
        menuTrigger.removeClass('menu-opened');
      }, 500);

      setTimeout(function(){
        menu.removeClass('animate-in animate-out'); 
      }, 1500);

    } else {
      $('.active').addClass('animate-out');
      
      menuTrigger.addClass('menu-opened');
      setTimeout(function(){
        menu.addClass('animate-in');

        if ($('.main-fullscreen').hasClass('active')) {
          header.removeClass('header-transparent');
        }  

        $('.active, .inner__content').animate({
          scrollTop: 0 ,
        }, 100);
      }, 500);
      setTimeout(function(){
        $('.active').removeClass('animate-out animate-in');
      }, 1200);
    }

  });

  // menu open from headline
  menuTriggerHead.on('click', function(event) {
    event.preventDefault();
    $('.active').addClass('animate-out');
    menuTrigger.addClass('menu-opened');
    setTimeout(function(){
      menu.addClass('animate-in');

      if ($('.main-fullscreen').hasClass('active')) {
        header.removeClass('header-transparent');
      }  

      $('.active, .inner__content').animate({
        scrollTop: 0 ,
      }, 100);
    }, 500);
    setTimeout(function(){
      $('.active').removeClass('animate-out animate-in');
    }, 1200);
  });

  // common actions on menu item click
  $('.navigation__link').on('click', function(event){
    $('.active').removeClass('active');
    $('.active-link').removeClass('active-link');
    menu.addClass('animate-out');
    setTimeout(function(){
      menuTrigger.removeClass('menu-opened');
    }, 500);
    setTimeout(function(){
      menu.removeClass('animate-in animate-out');
    }, 1500);
  });

  // home section open
  homeTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      mainSection.addClass('active animate-in');
      if ($('.main-fullscreen').hasClass('active')) {
        header.addClass('header-transparent');
      }
      homeTrigger.addClass('active-link');
    }, 500);
  });

  // about section open
  aboutTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      aboutSection.addClass('active animate-in');
      aboutTrigger.addClass('active-link');
    }, 500);
  });

  // works section open
  worksTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      worksSection.addClass('active animate-in');
      worksTrigger.addClass('active-link');
    }, 500);
  });

  // contact section open
  contactTrigger.on('click', function(event) {
    event.preventDefault();
    setTimeout(function(){
      contactSection.addClass('active animate-in');
      contactTrigger.addClass('active-link');
    }, 500);
  });

  // Popup Open/Close
  var notify            = $('#notify'),
      notifyTrigger     = $('#notify-trigger'),
      notifyClose       = $('#notify-close'),
      sayhello            = $('#sayhello'),
      sayhelloTrigger     = $('#sayhello-trigger'),
      sayhelloClose       = $('#sayhello-close');

  // Notify Form Open
  notifyTrigger.on('click', function(event){
    event.preventDefault();
    notify.addClass('animate-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
      notifyClose.addClass('is-scaled-up');
    });
  });

  // Notify Form Close
  notifyClose.on('click', function(event){
    event.preventDefault();
    notifyClose.removeClass('is-scaled-up');
    setTimeout(function(){
      notify.addClass('animate-out');
    }, 300);
    setTimeout(function(){
      notify.removeClass('animate-in animate-out');
    }, 1000);
  });

  // Contact Form Open
  sayhelloTrigger.on('click', function(event){
    event.preventDefault();
    sayhello.addClass('animate-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
      sayhelloClose.addClass('is-scaled-up');
    });
  });

  // Contact Form Close
  sayhelloClose.on('click', function(event){
    event.preventDefault();
    sayhelloClose.removeClass('is-scaled-up');
    setTimeout(function(){
      sayhello.addClass('animate-out');
    }, 300);
    setTimeout(function(){
      sayhello.removeClass('animate-in animate-out');
    }, 1000);
  });

  // Socials Mobile Open/Close
  var headerSocials      = $('#header-socials'),
      socialsTrigger     = $('#socials-trigger'),
      socialsClose       = $('#socials-close');

  // Socials Mobile Open
  socialsTrigger.on('click', function(event){
    event.preventDefault();
    socialsTrigger.addClass('is-hidden');
    headerSocials.addClass('animate-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
      socialsClose.addClass('is-scaled-up');
    });
    setTimeout(function(){
      
    }, 300);
  });

  // Socials Mobile Close
  socialsClose.on('click', function(event){
    event.preventDefault();
    socialsClose.removeClass('is-scaled-up');
    setTimeout(function(){
      headerSocials.addClass('animate-out');
      socialsTrigger.removeClass('is-hidden');
    }, 300);
    setTimeout(function(){
      headerSocials.removeClass('animate-in animate-out');
    }, 1000);
  });

  // PhotoSwipe Gallery Images Replace
    $('.my-gallery__link')
    // Background set up
    .each(function(){
    $(this)
    // Add a photo container
    .append('<div class="picture"></div>')
    // Set up a background image for each link based on data-image attribute
    .children('.picture').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
  });

});
