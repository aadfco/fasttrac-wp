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


// Countdown Timer
const fivek = new Date("March 14, 2020 09:00:00").getTime();

// countdown
let timer = setInterval(function() {

  // get today's date
  const today = new Date().getTime();

  // get the difference
  const diff = fivek - today;

  // math
  let days = Math.floor(diff / (1000 * 60 * 60 * 24));
  let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((diff % (1000 * 60)) / 1000);

  // display
  document.getElementById("countdown").innerHTML =
    "<div class=\"days\"> \
  <div class=\"numbers\">" + days + "</div>days</div> \
<div class=\"hours\"> \
  <div class=\"numbers\">" + hours + "</div>hrs</div> \
<div class=\"minutes\"> \
  <div class=\"numbers\">" + minutes + "</div>min</div> \
<div class=\"seconds\"> \
  <div class=\"numbers\">" + seconds + "</div>sec</div> \
</div>";

}, 1000);
