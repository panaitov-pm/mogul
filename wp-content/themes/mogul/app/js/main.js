;(function () {

    var $body = $('body'),
        $siteMain = $('.site-main'),
        subjectTitle = $siteMain.find('h2').first().text(),
        $modalWrap = $('.modal-wrap');

    $(document).ready(function($) {
        /*---------Products slider*/
            $('.slider-items').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                nextArrow: '<span class="slider-arrow-right"></span>',
                prevArrow: '<span class="slider-arrow-left"></span>',
                  responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                  }
                },
                {
                  breakpoint: 900,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: false
                  }
                },
                {
                  breakpoint: 620,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false
                  }
                }
              ]
            });

        /*-----------Show mobile nav menu*/
            $('.hamburger').click(function(event) {
                event.preventDefault();
                $body.toggleClass('js-nav-menu-active');
            });
        /*------------Show, close modal*/
            var $modalForm = $('.modal-form'),
            $form = $modalForm.find('form')[0];
            $(document).on('click', '.js-show-modal', function(event) {
                event.preventDefault();
                var $this = $(this),
                    postId = $this.data('post_id'),
                    pageId = $this.data('page_id'),
                    $modalBrand = $('.modal__brand-info');
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
                        beforeSend: function() {
                            $modalBrand.html(' ');
                            $modalBrand.removeClass('js-modal-open');
                        },
                        success: function(response) {
                            $modalBrand.html(response);
                            setTimeout(function() {
                                $modalBrand.addClass('js-modal-open');
                            }, 300);
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
                if ( $($form).length ) {
                    $form.reset();
                    $modalForm.find('[class*=not-valid-tip]').hide();
                }
            }).children().click(function(e){        
                e.stopPropagation();   
            }); // end click

            $('.modal__close').click(function(event) {
                event.preventDefault();
                openCloseModal();
                if ( $($form).length ) {
                    $form.reset();
                    $modalForm.find('[class*=not-valid-tip]').hide();
                }
            }); // end click

        /*------------Set main form subject to input value*/
            $(document).on('click', '.main-form__btn', function() {
                $siteMain.find('.field-subject').val(subjectTitle);
            });
        /*------------Set main form subject to input value*/
            $(document).on('click', '.contact-form__btn a', function() {
                var title = $(this).find('img').attr('alt');
                console.log(title);

                $modalWrap.find('.main-form__title').text(title);
            });
    }); // end ready


    $(window).on('load resize ready', function() {
        //----------Close mobile menu
            $body.removeClass('js-nav-menu-active');

            if (window.matchMedia('(max-width: 992px)').matches) {
                $('.main-navigation').on('click', 'a', function(event) {
                    event.preventDefault();
                    var link = $(this).attr('href');
                    
                    $body.removeClass('js-nav-menu-active');
                    setTimeout(function() {
                        window.location.href = link;
                    }, 300);
                });
            }
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