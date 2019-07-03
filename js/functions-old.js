// Cookie noConflict naming
var ftCookie = Cookies.noConflict();

// Enable cookie when Got It button is clicked on cookie banner
  function cNotifyDismiss() {
    ftCookie.set('eucBanner', 'true', {expires: 365, path: '/'});
  }

// Begin rules and function if cookie exists for Cookie Notify Banner
var cnbFetch = ftCookie.get('eucBanner');
var cnwElement = document.querySelector(".c-notify-wrapper");

function cnbHide(){
  cnwElement.parentNode.removeChild(cnwElement);
}

if(cnbFetch){
  cnbHide();
}

// Enable cookie when close button is clicked on Fast Points Reminder
  function fprDismiss() {
    ftCookie.set('fprPopup', 'true', {expires: 182, path: '/'});
  }

// Fast Points Reminder Popup
    var fpr = $('.fast-points-reminder');
    var fprShow = "fpr-show";

// Fetch cookie value to check true or false. If false run scroll event
  var fprCFetch = ftCookie.get('fprPopup');

  function fpRemind() {
    fpr.addClass(fprShow);
  }

  // Check if cookie exists. If null, run fprScroll to show popup.
  if(fprCFetch == null){
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
    document.addEventListener('scroll',fprScroll);
    }
  }

  // Hide element from DOM if cookie exists.
  var fprElement = document.querySelector(".fast-points-reminder");

  function fprHide(){
    fprElement.parentNode.removeChild(fprElement);
  }

  if(fprCFetch){
    fprHide();
  }
