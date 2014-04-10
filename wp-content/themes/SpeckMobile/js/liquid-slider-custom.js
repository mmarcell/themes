jQuery(document).ready(function($) {
    $(function(){
      $('#slider-id').liquidSlider({
          autoHeight: true,
          autoSlide: false,
          slideEaseFunction: 'easeOutSine',
          dynamicArrows: true,
          slideEaseDuration: 550,
          crossLinks: false,
          autoSlideControls: true,
          responsive: true
        });
    });
});

jQuery(document).ready(function($) {
    $(function(){
      $('#one').liquidSlider({
         autoHeight: true,
          autoSlide: true,
          slideEaseFunction: 'easeOutSine',
          dynamicArrows: false,
          slideEaseDuration: 400,
          crossLinks: false,
          autoSlideControls: true,
          responsive: true
        });
    });
});

jQuery(document).ready(function($) {
    $(function(){
      $('#event-mobile').liquidSlider({
          autoHeight: true,
          autoSlide: true,
          slideEaseFunction: 'easeOutSine',
          dynamicArrows: false,
          slideEaseDuration: 550,
          crossLinks: false,
          autoSlideControls: true,
          responsive: true
        });
    });
});