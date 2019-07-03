// No conflict var calls
var ftCookie = Cookies.noConflict();
var jQn = jQuery.noConflict();

// Initialize Foundation
jQn(document).foundation();

// Enable cookie when Got It button is clicked on cookie banner
function cNotifyDismiss() {
  ftCookie.set('eucBanner', 'true', {expires: 365, path: '/'});
}

// Cookie Banner Fetch Call
var cnbFetch = ftCookie.get('eucBanner');

// Hide Cookied elements if cookies exists.
var cnwElement = document.querySelector(".c-notify-wrapper");

function cnbHide(){
  cnwElement.parentNode.removeChild(cnwElement);
}

if(cnbFetch){
  cnbHide();
}

// Iniitialize Hamburger Menu
jQn('.hamburger').click(function(){
	jQn(this).toggleClass('is-active');
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



// Enable sticky tab nav on Food and Drinks Page
var tabnav = jQn('.tab-nav-group');
var tabnavScroll = "tab-nav-scroll";

jQn(window).scroll( function() {
  var pagehero = jQn(".page-hero").height();

  if( jQn(this).scrollTop() > pagehero ) {
    tabnav.addClass(tabnavScroll);
  }
  else {
    tabnav.removeClass(tabnavScroll);
  }
});


// Food and Drinks Page: Hide Drinks on page load
jQn(".drinks").hide();

// Shows and hides filtered items
jQn(".filter-simple-button").click(function() {
  var value = jQn(this).attr('data-filter');
    jQn(".stacked-wrapper").not('.'+value).hide();
    jQn('.stacked-wrapper').filter('.'+value).show();
});


// Changes active class on filter buttons
jQn('.filter-simple-button').click(function () {
  jQn(this).siblings().removeClass('is-active');
  jQn(this).addClass('is-active');
});


// Animated Number Counter
  var a = 0;
  var countItems = document.querySelector('.counter-items-container');

  if (countItems) {
    function counterAnimate() {
      jQn('.counter-number').each(function() {
        var $this = jQn(this),
          countTo = $this.attr('data-count');
        jQn({
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
    document.addEventListener('scroll', counterAnimate);
  }
