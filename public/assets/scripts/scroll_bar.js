


jQuery(function ($) {
    'use strict';

    // -------------------------------------------------------------
    //   Basic Navigation
    // -------------------------------------------------------------
    (function () {
        var $frame = $('#basic');
        var $slidee = $frame.children('ul').eq(0);
        var $wrap = $frame.parent();

        // Call Sly on frame
        var sly = $frame.sly({
            horizontal: 1,
            itemNav: 'basic',
            smart: 1,
            activateOn: 'click',
            mouseDragging: 1,
            touchDragging: 1,
            releaseSwing: 1,
            startAt: 3,
            scrollBar: $wrap.find('.scrollbar'),
            scrollBy: 1,
            pagesBar: $wrap.find('.pages'),
            activatePageOn: 'click',
            speed: 300,
            elasticBounds: 1,
            easing: 'easeOutExpo',
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 1
        });
    })();
});

$(document).ready(function(){
   // $('#pause').on('click', function(){
   //    if($(this).text() == 'Pause'){
   //        $(this).text('Continue');
   //    }else{
   //        $(this).text('Pause');
   //    }
   // });
   //  $('#head').on('click', function(){
   //      if($(this).text() == 'Head ON'){
   //          $(this).text('Head OFF');
   //      }else{
   //          $(this).text('Head ON');
   //      }
   //  });
   //  $('#bed').on('click', function(){
   //      if($(this).text() == 'Bed ON'){
   //          $(this).text('Bed OFF');
   //      }else{
   //          $(this).text('Bed ON');
   //      }
   //  });
});
//# sourceURL=pen.js
