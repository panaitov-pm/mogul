;(function () {

    var $body = $('body'),
        $siteMain = $('.site-main'),
        subjectTitle = $siteMain.find('h2').first().text(),
        $modalWrap = $('.modal-wrap');

    $(document).ready(function($) {

        /*-----------Show mobile nav menu*/
            $('.hamburger').click(function(event) {
                event.preventDefault();
                $body.toggleClass('js-nav-menu-active');
            });
        /*------------Show, close modal*/
            $(document).on('click', '.js-show-modal', function(event) {
                event.preventDefault();
                 $modalWrap.find('.main-form__title').text(subjectTitle);
                 $modalWrap.find('.field-subject').val(subjectTitle);
                openCloseModal();
            }); // end click

             $modalWrap.click(function(e){
                openCloseModal();
            }).children().click(function(e){        
                e.stopPropagation();   
            }); // end click

            $('.modal__close').click(function(event) {
                event.preventDefault();
                openCloseModal();
            }); // end click
        /*------------Set main form subject to input value*/
            $(document).on('click', '.main-form__btn', function() {
                $siteMain.find('.field-subject').val(subjectTitle);
            });
    }); // end ready


    $(window).on('load resize ready', function() {
        //----------Delete class
            $body.removeClass('js-nav-menu-active');
    });

    //---------Is visible page
        function isVisiblePage(elem) {

            var elemPos = elem.offset().top,
              $window = $(window),
              pagePos = $window.scrollTop(),
              totalHeight = elemPos + elem.height();

            return ( totalHeight <= pagePos + $window.height() && elemPos >= pagePos);
          }
    /*---------Open close modal*/
        function openCloseModal() {
            if( !$body.hasClass('js-modal-open') ) {
                $body.addClass('js-modal-open');
                $modalWrap.addClass('js-modal-open');
            } else {
                $body.removeClass('js-modal-open');
                $modalWrap.removeClass('js-modal-open');
            }
        }

})();