// Cookie noConflict naming and jQuery No Conflict
var jQn = jQuery.noConflict();

// Cookie fetch call variables *Note: ftCookie variable is called from app.js
var fprCFetch = ftCookie.get('fprPopup');

// Hide Cookied elements if cookies exists.
var fprElement = document.querySelector(".fast-points-reminder");

function fprHide(){
  fprElement.parentNode.removeChild(fprElement);
}

if(fprCFetch){
  fprHide();
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
