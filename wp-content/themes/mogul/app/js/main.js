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
            $('.js-show-modal').click( function(event) {
                event.preventDefault();
                var $this = $(this),
                    postId = $this.data('post_id'),
                    pageId = $this.data('page_id');
                 $modalWrap.find('.main-form__title').text(subjectTitle);
                 $modalWrap.find('.field-subject').val(subjectTitle);
            /*-------Set brand information to modal window*/
                 if ($this.hasClass('brand')) {
                    $.ajax({
                        url: php_path.template_url + '/template-parts/brand-modal-info.php',
                        type: 'POST',
                        data: {
                            postId: postId
                        },
                        success: function (response) {
                            $('.modal__brand-info').html(response);
                        }
                    });
                 }
            /*-------Set portfolio image to modal window*/
                 if ($this.hasClass('portfolio_content__link')) {
                    var link = $this.attr('href'),
                        $modalImg = $('.modal-form__img');
                    $modalImg.attr('src', '');
                    $modalImg.attr('src', link);
                    $('.modal').addClass('modal--img');
                 }
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
        /*------------Set review first 5 words font size */
            // var a = new String;
            // a = $('.review__desc').html();
            // var b = a.indexOf(' '); 
            // if (b == -1) {
            // b = a.length;
            // }
            // $('.review__desc').html('<span class="first_word">'+a.substring(0, b)+'</span>'+a.substring(b, a.length));
            // });
        /*------------Show modal with portfolio image*/
            //$('.portfolio_content__item a').fancybox();
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
                $modalWrap.find('.modal').removeClass('modal--img')
            }
        }

})();