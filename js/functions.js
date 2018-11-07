// Cookie noConflict naming and jQuery No Conflict
var ftCookie = Cookies.noConflict();
var jQn = jQuery.noConflict();

// Enable cookie when Got It button is clicked on cookie banner
function cNotifyDismiss() {
  ftCookie.set('eucBanner', 'true', {expires: 365, path: '/'});
}

// Cookie fetch call variables
var fprCFetch = ftCookie.get('fprPopup');
var cnbFetch = ftCookie.get('eucBanner');

// Hide Cookied elements if cookies exists.
var cnwElement = document.querySelector(".c-notify-wrapper");
var fprElement = document.querySelector(".fast-points-reminder");

function fprHide(){
  fprElement.parentNode.removeChild(fprElement);
}

if(fprCFetch){
  fprHide();
}

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
var fpr = jQn('.fast-points-reminder');
var fprShow = "fpr-show";

function fpRemind() {
  fpr.addClass(fprShow);
}

// Check if cookie exists. If null, run fprScroll to show popup.
if(fprCFetch == null){
  var slhCheck = jQn(".store-locator-home").length;

  if (slhCheck) {
    function fprScroll() {
      var slHome = jQn('.store-locator-home');
      var docViewTop = jQn(window).scrollTop();
      var docViewBottom = docViewTop + jQn(window).height();
      var slTop = slHome.offset().top;
      var slBottom = slTop + slHome.height();

      if ((slBottom <= docViewBottom) && (slTop >= docViewTop)) {
        fpRemind();
      }
    }
  document.addEventListener('scroll',fprScroll);
  }
}
