function confirmDelete() {
  return confirm('Are you sure you want to delete this department?');
}


(function($) {

  'use strict';

  $(function() {

    var sidebar = $('.sidebar');



    





    //Change sidebar and content-wrapper height

    applyStyles();



    function applyStyles() {

      //Applying perfect scrollbar

      if ($('.scroll-container').length) {

        const ScrollContainer = new PerfectScrollbar('.scroll-container');

      }

    }



    //checkbox and radios

    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');





    $(".purchace-popup .popup-dismiss").on("click",function(){

      $(".purchace-popup").slideToggle();

    });

  });
  

})(jQuery);

