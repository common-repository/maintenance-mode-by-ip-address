/******************************************************************************************************************************
COMMING SOON PAGE
*******************************************************************************************************************************/
(function($) {
  /**
   * Set your date here  (YEAR, MONTH (0 for January/11 for December), DAY, HOUR, MINUTE, SECOND)
   * according to the GMT+0 Timezone
   **/
  var launch = new Date(rcmmip_date);

  /**
   * The script
   **/
  var message = $('#message');
  var days = $('#days, #m_days');
  var hours = $('#hours, #m_hours');
  var minutes = $('#minutes, #m_minutes');
  var seconds = $('#seconds, #m_seconds');

  setDate();

  function setDate() {
    var now = new Date();

    if (launch < now) {
      days.html('<h1>0</h1><p>Day</p>');
      hours.html('<h1>0</h1><p>Hour</p>');
      minutes.html('<h1>0</h1><p>Minute</p>');
      seconds.html('<h1>0</h1><p>Second</p>');
      //message.html('OUR SITE IS NOT READY YET...');
      $(".countDownContainer").hide();

    } else {

      var timeDiff = launch.getTime() - now.getTime();
      if (timeDiff <= 0) {
        clearTimeout(timer);
        //document.write("Christmas is here!");
        // Run any code needed for countdown completion here
      }
      var s = Math.floor(timeDiff / 1000);
      var m = Math.floor(s / 60);
      var h = Math.floor(m / 60);
      var d = Math.floor(h / 24);

      h %= 24;
      m %= 60;
      s %= 60;

      days.html('<h1>' + d + '</h1><p>Day' + (d > 1 ? 's' : ''), '</p>');
      hours.html('<h1>' + h + '</h1><p>Hour' + (h > 1 ? 's' : ''), '</p>');
      minutes.html('<h1>' + m + '</h1><p>Minute' + (m > 1 ? 's' : ''), '</p>');
      seconds.html('<h1>' + s + '</h1><p>Second' + (s > 1 ? 's' : ''), '</p>');

      setTimeout(setDate, 1000);
    }
  }
})(jQuery);
/******************************************************************************************************************************
ANIMATIONS
*******************************************************************************************************************************/
(function($) {
  "use strict";
  var isMobile = false;
  if (navigator.userAgent.match(/Android/i) ||
    navigator.userAgent.match(/webOS/i) ||
    navigator.userAgent.match(/iPhone/i) ||
    navigator.userAgent.match(/iPad/i) ||
    navigator.userAgent.match(/iPod/i) ||
    navigator.userAgent.match(/BlackBerry/i)) {
    isMobile = true;
  }
  if (isMobile == true) {
    $('body').removeClass('nomobile');
    $('.animated').removeClass('animated');
  }
  $(function() {
    if (isMobile == false) {
      $('*[data-animated]').addClass('animated');
    }

    function animated_contents() {
      $(".animated:appeared").each(function(i) {
        var $this = $(this),
          animated = $(this).data('animated');

        setTimeout(function() {
          $this.addClass(animated);
        }, 50 * i);
      });
    }
    animated_contents();
    $(window).scroll(function() {
      animated_contents();
    });
  });
})(jQuery);