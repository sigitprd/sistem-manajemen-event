jQuery(document).ready(function ($) {

  // Header fixed and Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
      $('#header').addClass('header-fixed');
    } else {
      $('.back-to-top').fadeOut('slow');
      $('#header').removeClass('header-fixed');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs
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

    $(document).on('click', '.menu-has-children i', function (e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function (e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function (e) {
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

  // Smoth scroll on page hash links
  $('a[href*="#"]:not([href="#"])').on('click', function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (!$('#header').hasClass('header-fixed')) {
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

  // Porfolio filter
  $("#portfolio-flters li").click(function () {
    $("#portfolio-flters li").removeClass('filter-active');
    $(this).addClass('filter-active');

    var selectedFilter = $(this).data("filter");
    $("#portfolio-wrapper").fadeTo(100, 0);

    $(".portfolio-item").fadeOut().css('transform', 'scale(0)');

    setTimeout(function () {
      $(selectedFilter).fadeIn(100).css('transform', 'scale(1)');
      $("#portfolio-wrapper").fadeTo(300, 1);
    }, 300);
  });

  // jQuery counterUp
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });

  // custom code
     $(document).on('click','#btn-more',function(){
         var id_laporan = $(this).data('id');
         $("#btn-more").html("Loading....");
         $.ajax({
             url : '/dashboard',
             method : "POST",
             headers: {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
             },
             data : {id_laporan:id_laporan},
             dataType : "text",
             success : function (data)
             {
                if(data != '')
                {
                    $('#remove-row').remove();
                    $('#load-data').append(data);
                }
                else
                {
                    $('#btn-more').html("No Data");
                }
             },
             error : function (xhr){
               console.log(xhr);
             }
         });
     });

     $(document).on('click','#btn-more2',function(){
         var id_laporan = $(this).data('id');
         $("#btn-more2").html("Loading....");
         $.ajax({
             url : '/laporan-saya',
             method : "POST",
             headers: {
               'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
             },
             data : {id_laporan:id_laporan},
             dataType : "text",
             success : function (data)
             {
                if(data != '')
                {
                    $('#remove-row').remove();
                    $('#load-data').append(data);
                }
                else
                {
                    $('#btn-more2').html("No Data");
                }
             },
             error : function (xhr){
               console.log(xhr);
             }
         });
     });

     // view photo
     // create references to the modal...
     $(document).on('click','#myImg',function(){
     var modal = document.getElementById('myModal');
     // to all images -- note I'm using a class!
     var images = document.getElementsByClassName('myImages');
     // the image in the modal
     var modalImg = document.getElementById("img01");
     // and the caption in the modal
     var captionText = document.getElementById("caption");

     // Go through all of the images with our custom class
     for (var i = 0; i < images.length; i++) {
     var img = images[i];
     // and attach our click listener for this image.
     img.onclick = function(evt) {
       modal.style.display = "block";
       modalImg.src = this.src;
       captionText.innerHTML = this.alt;
     }
     }

     var span = document.getElementsByClassName("close")[0];

     span.onclick = function() {
     modal.style.display = "none";
     }

     });

})(jQuery);
