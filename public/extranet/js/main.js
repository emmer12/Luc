jQuery(document).ready(function( $ ) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Stick the header at top on scroll
  $("#header").sticky({topSpacing:0, zIndex: '50'});

  // Intro background carousel
  $("#intro-carousel").owlCarousel({
    autoplay: true,
    dots: false,
    loop: true,
    animateOut: 'fadeOut',
    items: 1
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if( ! $('#header').hasClass('header-fixed') ) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });


  // Porfolio - uses the magnific popup jQuery plugin
  $('.portfolio-popup').magnificPopup({
    type: 'image',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out',
      opener: function(openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: { 0: { items: 1 }, 768: { items: 2 }, 900: { items: 3 } }
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: { 0: { items: 2 }, 768: { items: 4 }, 900: { items: 6 }
    }
  });

  //Google Map
  var get_latitude = $('#google-map').data('latitude');
  var get_longitude = $('#google-map').data('longitude');

  function initialize_google_map() {
    var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
    var mapOptions = {
      zoom: 14,
      scrollwheel: false,
      center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize_google_map);

});

// Preloader
$(window).on('load', function() {
  $('#preloader').delay(100).fadeOut('slow',function(){$(this).remove();});
});


// Accordion 
$(function() {
	$('.accordion').find('.accordion__title').click(function(){
		// Adds active class
		$(this).toggleClass('active');
		// Expand or collapse this panel
		$(this).next().slideToggle('fast');
		// Hide the other panels
		$('.accordion__content').not($(this).next()).slideUp('fast');
		// Removes active class from other titles
		$('.accordion__title').not($(this)).removeClass('active');		
	});
});

// **************** Custom *****************//

$(".nav-r li").click(function(e){
  $(".tog").fadeOut();
  $(".nav-r li").removeClass('nav-active')
  //$(this).removeClass('nav-active')
  var target=$(this).data('nav');
  if (!$(this).hasClass('nav-active')) {

    $("."+target).fadeIn();
    $(this).addClass('nav-active')
  }else{
    $("."+target).fadeIn();
    $(this).removeClass('nav-active')
  }

})


$('#form-r').validate({
  rules: {
    title: {
      minlength: 3,
      maxlength: 20,
      required: true
    },
    email: {
      email: true,
      required: true
    },
    clerify:{
      required:true
    },
    password:{
      required:true,
      minlength:6
    },
    c_password:{
      required:true,
      minlength:6,
      equalTo:'[name="password"]'
    }
  },
  highlight: function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  unhighlight: function(element) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
  },
  submitHandler:function(form, event) {
    event.preventDefault();
    // var form=$(form).serializeArray();
    $.ajax({
      method:"POST",
      url:"/register-res",
      cache:false,
      contentType:false,
      processData:false,
      data:new FormData(form),
      beforeSend: function () {
        $("#form-r").addClass('loading')
      },
      success: function (response) {
        $("#form-r").removeClass('loading')
        if (response.success) {
          window.location.href='/login?id='+response.property_id
        }
        
      },
      error: function (response) {
        $("#form-r").removeClass('loading')
        $(".msg").html(`<div class='alert alert-danger'>${responce }</div>`);

      }
    })
    }
});

$('#form-c').validate({
  rules: {
    title: {
      minlength: 3,
      maxlength: 20,
      required: true
    },
    email: {
      email: true,      
      required: true
    },
    clerify:{
      required:true
    },
    password:{
      required:true,
      minlength:6
    },
    c_password:{
      required:true,
      minlength:6,
      equalTo:'[name="password"]'
    }
  },
  highlight: function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  unhighlight: function(element) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
  },
  submitHandler:function(form, event) {
    event.preventDefault();
    // var form=$(form).serializeArray();
    $.ajax({
      method:"POST",
      url:"/register-com",
      cache:false,
      contentType:false,
      processData:false,
      data:new FormData(form),
      beforeSend: function () {
        $("#form-c").addClass('loading')
      },
      success: function (response) {
        $("#form-r").removeClass('loading')
        if (response.success) {
          window.location.href='/login?id='+response.property_id
        }
        
      },
      error: function (response) {
        $("#form-c").removeClass('loading')
        $(".msg").html(`<div class='alert alert-danger'>Oopes somthing went wrong please check you inpu value</div>`);
      }
    })
    }
});

$('.property_id').change(function(){
  $.ajax({
    method:"GET",
    url:"/getproperty",
    data:{'property_id':$(this).val()},
    success:function(data){
      console.log(data.address);
      
      $('input#property_address').val(data.address);
      $('').val(data.address);

    },
  })

})

$('#form-al').validate({
  rules: {
    username: {
      required: true
    }
  },
  highlight: function(element) {
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  unhighlight: function(element) {
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
  },
  });