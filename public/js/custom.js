/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function





jQuery(document).ready(function($) {

    /*
     * Let's fire off the gravatar function
     * You can remove this if you don't need it
    */
    loadGravatars();

  /* ===========================================
      Top Nav Show on Page Scroll
     =============================================*/

    // Hide and show top navigation on page scroll
    function scrollNav(){
      var win=$(window);
      var scrolled=win.scrollTop();
      

      if (scrolled>100){
        $('.header').addClass('show').removeClass('hide');;
      } else {
        $('.header').addClass('hide').removeClass('show');
      }
    }
    $(window).scroll(function(){
      scrollNav();
    });
  
    // Anchor smooth scroll
    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

    // Remodal script
    $(document).on("open", ".remodal", function () {
        console.log("open");
    });

    $(document).on("opened", ".remodal", function () {
        console.log("opened");
    });

    $(document).on("close", ".remodal", function (e) {
        console.log('close' + (e.reason ? ", reason: " + e.reason : ''));
    });

    $(document).on("closed", ".remodal", function (e) {
        console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
    });

    $(document).on("confirm", ".remodal", function () {
        console.log("confirm");
    });

    $(document).on("cancel", ".remodal", function () {
        console.log("cancel");
    });

    //    You can open or close it like this:
    //    $(function () {
    //        var inst = $.remodal.lookup[$("[data-remodal-id=modal]"").data("remodal")];
    //        inst.open();
    //        inst.close();
    //    });

    //  Or init in this way:
    var inst = $("[data-remodal-id=modal2]").remodal();
    //  inst.open();



    // INCREMENT COUNTER
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
			if(currentVal==1)
				 $('input[name='+fieldName+']').val('');
			else
            	$('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val('');
        }
    });

    
    // STOP SCROLLING IN DIV
    $('.rd-time-list').bind('mousewheel DOMMouseScroll', function(e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        }
        else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });

    //Initialize WOW.js to load animation when in viewport
    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       15,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
          // the callback is fired every time an animation is started
          // the argument that is passed in is the DOM node being animated
        }
      }
    );
    wow.init();

    //Initialize animsition.js to activate page loading effect
    $(".animsition").animsition({
      inClass               :   'fade-in',
      outClass              :   'fade-out',
      inDuration            :    1500,
      outDuration           :    800,
      linkElement           :   '.animsition-link',
      // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
      loading               :    true,
      loadingParentElement  :   'body', //animsition wrapper element
      loadingClass          :   'animsition-loading',
      unSupportCss          : [ 'animation-duration',
                                '-webkit-animation-duration',
                                '-o-animation-duration'
                              ],
      //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
      //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
      overlay               :   false,
      overlayClass          :   'animsition-overlay-slide',
      overlayParentElement  :   'body'
    });

}); 
