/* Custom modules used:
 * Responsive
 * Preloader
 * Keyboard Controls (but manually removed)
 */

/* Here is the slider using default settings */
//$('#slider-id').liquidSlider({
$('#slider-id').liquidSlider({
  dynamicArrows:false,
  continuous:false,
  dynamicTabs:false
});

/* Config */
var sliderMaxWidth  = '900',
    maxNumberOfSlidesShown = 5,
    useAutoslide     = true,
    autoslideDelay  = 5000;
/* End Config */


// 600px using my defaults
var midSwitch = sliderMaxWidth * ((maxNumberOfSlidesShown - 1) / maxNumberOfSlidesShown),
// 300px using my defaults
    smallSwitch = sliderMaxWidth * ((maxNumberOfSlidesShown - 2) / maxNumberOfSlidesShown);
// Set more if you desire, but add conditionals below.

// conditionals based on the screen width, we show a different # of slides.
// You can also set different heights here as well
function determineSlidesShown() {
  if (sliderObject.slideWidth < smallSwitch) {
    // Switch to the smallest setting
    numberOfSlidesShown = maxNumberOfSlidesShown - 2;
  } else if (sliderObject.slideWidth < midSwitch) {
    // if that fails, move to the mid width
    numberOfSlidesShown = maxNumberOfSlidesShown - 1;
  } else {
    //This is for the heighest width
    numberOfSlidesShown = maxNumberOfSlidesShown;
  }
  setSlidesShown();
};

var weAreOnSlideNumber;
function setSlidesShown() {
  $('.liquid-slider-wrapper').css('max-width', sliderMaxWidth);
  $('.liquid-slider-wrapper .liquid-slider .panel').css('width', 100 / (sliderObject.panelCount * numberOfSlidesShown) + '%');

  // Store the first panel so we know where we are (also reset on resize)
  weAreOnSlideNumber = sliderObject.options.firstPanelToLoad - 1; // Make it 0 based
  //adjust current slide
  sliderObject.currentTab = (weAreOnSlideNumber);
  sliderObject.transition();
}

// Store the slider in an object. you shouldnt need to edit this
var sliderObject = $.data( $('#slider-id')[0], 'liquidSlider');

// Store the first panel so we know where we are
var weAreOnSlideNumber = sliderObject.options.firstPanelToLoad - 1; // Make it 0 based

// Call above functions to determine and set the panels in view first load
determineSlidesShown();

// if the browser width changes...
var resizingTimeout;
// A timeout so it runs only after resizing is released
$(window).bind('resize', function () {
  clearTimeout(resizingTimeout);
    resizingTimeout = setTimeout(function () {
      // Send to adjust the height after resizing completes
      determineSlidesShown();
      sliderObject.transition();
    }, 500);
});

// The autoslide
var direction = '.arrow-right', // 1 => Slide right
    lsAutoslide;
function autoslideFn() {
  lsAutoslide = setTimeout(function() {
    // Direction is set based on slide position
    $(direction).trigger('click');
    autoslideFn();
  }, autoslideDelay);
}
// Call the autoslide if enabled
if (useAutoslide) {
  // You may want to run this on load if you have a lot of images
  //$(window).bind("load", function () {
    autoslideFn();
  //}
}

// Move on arrow clicks
$('.arrow-left').on('click', function() {
  clearTimeout(lsAutoslide);
  if (weAreOnSlideNumber === 0) {
    direction = '.arrow-right';
    return false;
  }
  weAreOnSlideNumber -= 1;
  sliderObject.currentTab = sliderObject.currentTab - (1 / numberOfSlidesShown);
  sliderObject.transition();
});
$('.arrow-right').on('click', function() {
  clearTimeout(lsAutoslide);
  if (weAreOnSlideNumber === (sliderObject.panelCount - numberOfSlidesShown) ) {
    direction = '.arrow-left';
    return false;
  }
  weAreOnSlideNumber += 1;
  sliderObject.currentTab = sliderObject.currentTab + (1 / numberOfSlidesShown);
  sliderObject.transition();
});