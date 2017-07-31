;(function () {

    var $body = $('body');

    $(document).ready(function($) {

        //-----------Show mobile nav menu
            $('.hamburger').click(function(event) {
                event.preventDefault();
                $body.toggleClass('js-nav-menu-active');
            });
    
    }); // end ready


    $(window).on('load resize ready', function() {
        //----------Delete class
            $body.removeClass('js-nav-menu-active');
       

       
    });

    $(window).on('scroll', function(event) {
       
    });

    //---------Is visible page
        function isVisiblePage(elem) {

            var elemPos = elem.offset().top,
              $window = $(window),
              pagePos = $window.scrollTop(),
              totalHeight = elemPos + elem.height();

            return ( totalHeight <= pagePos + $window.height() && elemPos >= pagePos);
          }

})();