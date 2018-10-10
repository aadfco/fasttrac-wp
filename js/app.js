( function($) {
  jQuery(document).foundation()
  $('.hamburger').click(function(){
		$(this).toggleClass('is-active');
	});

  // Wow Animation Settings and Initialization
	wow = new WOW({
		boxClass:						'wow',
		anmiateClass:				'animated',
		offset:							0,
		mobile:							true,
		live:								true
  	})
	wow.init();

  // Fast Points Reminder Popup
    var fpr = $('.fast-points-reminder');
    var fprShow = "fpr-show";

    function fpRemind() {
      fpr.addClass(fprShow);
    }

    var homeCheck = $(".store-locator-home").length;

    if (homeCheck) {
      function fprScroll() {
        var slHome = $('.store-locator-home');
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var slTop = $(slHome).offset().top;
        var slBottom = slTop + $(slHome).height();

        if ((slBottom <= docViewBottom) && (slTop >= docViewTop)) {
          fpRemind();
        }
      }
    window.addEventListener('scroll',fprScroll);
    }


  // Enable sticky tab nav on Food and Drinks Page
    var tabnav = $('.tab-nav-group');
    var tabnavScroll = "tab-nav-scroll";

    $(window).scroll( function() {
      var pagehero = $(".page-hero").height();

      if( $(this).scrollTop() > pagehero ) {
        tabnav.addClass(tabnavScroll);
      }
      else {
        tabnav.removeClass(tabnavScroll);
      }
    });


  //Hide Drinks on page load
  $(".drinks").hide();


  // shows and hides filtered items
  $(".filter-simple-button").click(function() {
    var value = $(this).attr('data-filter');
      $(".stacked-wrapper").not('.'+value).hide();
      $('.stacked-wrapper').filter('.'+value).show();
  });


  // changes active class on filter buttons
  $('.filter-simple-button').click(function () {
    $(this).siblings().removeClass('is-active');
    $(this).addClass('is-active');
  });


  // Animated Number Counter
  var a = 0;
  var aboutCheck = window.location.href.indexOf('about.php');

  window.onload = function() {
    if (aboutCheck > -1) {
      $(window).scroll(function() {
        var oTop = $('.counter-items-container').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
          $('.counter-number').each(function() {
            var $this = $(this),
              countTo = $this.attr('data-count');
            $({
              countNum: $this.text()
            }).animate({
                countNum: countTo
              },
              {
                duration: 3000,
                easing: 'swing',
                step: function() {
                  $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                  $this.text(this.countNum);
                  //alert('finished');
                }
              });
          });
          a = 1;
        }
      });
    }
  }

})(jQuery); //end document.ready
