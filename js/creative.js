(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 57)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 57
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  // Scroll reveal calls
  window.sr = ScrollReveal();
  sr.reveal('.sr-icons', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 200);
  sr.reveal('.sr-button', {
    duration: 1000,
    delay: 200
  });
  sr.reveal('.sr-contact', {
    duration: 600,
    scale: 0.3,
    distance: '0px'
  }, 300);

  // Magnific popup calls
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });

  // Ajax workground, please dont follow
    $(function() {
        /*
                $("#search").click(function() {
                    $.ajax({
                        type: "GET",
                        url: "title.php?number= " + $("#keyword").val(),
                        dataType: "json",
                        success: function(data) {
                            if (data.number) {
                                $("#searchResult").html(
                                    '[找到員工] 員工編號：' +data.number + ', 姓名：' + data.name + ', 性別：' + data.sex
                                );
                            } else {
                                $("#searchResult").html(data.msg);
                            }
                        },
                        error: function(jqXHR) {
                            alert("發生錯誤: " + jqXHR.status);
                        }
                    })
                })
                        */
                    $.ajax({
                        type: "GET",
                        context:"../template/index.html",
                        url: "title.php",
                        dataType: "json",
                        success: function (data) {
                            $("#name").html(data.name);
                            $("#nationality").html(data.name);
                            $("#gender").html(data.gender);
                            $("#platform").html(data.platform);
                            $("#category").html(data.name);
                            $("#follower").html(data.name);
                        },
                        error: function (jqXHR) {
                            alert("發生錯誤: " + jqXHR.status);
                        }
                    })



    /*$("#save").click(function() {
            $.ajax({
                type: "POST",
                url: "service.php",
                dataType: "json",
                data: {
                    name: $("#staffName").val(),
                    number: $("#staffNumber").val(),
                    sex: $("#staffSex").val()
                },
                success: function(data) {
                    if (data.name) {
                        $("#createResult").html('員工：' + data.name + '，儲存成功！');
                    } else {
                        $("#createResult").html(data.msg);
                    }
                },
                error: function(jqXHR) {
                    alert("發生錯誤: " + jqXHR.status);
                }
            })
        })
        */
    });

})(jQuery); // End of use strict
