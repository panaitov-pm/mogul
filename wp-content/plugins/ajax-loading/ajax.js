 ;(function(){
    var linkCat,
        $mainBox = $('.portfolio_content__inner');
  $(document).ready(function() {

      /*------Portfolio page loading category posts */
        $('.portfolio__nav').on('click', 'a', function(event) {
           event.preventDefault();
           var $this = $(this),
                titleCat = $this.text(),
                linkCat = $this.attr('href'),
                pageID = $this.data('page_id'),
                catID = $this.data('cat_id');
                
          if (pageID) {
            pageID = pageID;
          } else {
            pageID = '';
          }
          if (catID) {
            catID = catID;
          } else {
            catID = '';
          }

           document.title = titleCat;
           history.pushState({page_title: titleCat}, titleCat, linkCat);
           ajaxCat(linkCat, pageID, catID);
        });
        /*Events of the browser buttons forward and backward*/
           window.addEventListener('popstate', function (e) {
             document.title = e.state.page_title;
             ajaxCat(location.href, pageID, catID);
           }, false);
      /*------Reviews page load more button*/
        $(document).on('click', '.reviews__load', function (e) {
          e.preventDefault();
          var container = $('.reviews__inner');
          if ( container.length ) {
              var data = {
                  action:   'more_posts',
                  offset:   container.find('.review').length
              };
              $.ajax({
                url: params.ajax_url,
                type: 'POST',
                dataType: 'html',
                data: data,
                beforeSend: function(){
                  container.animate({opacity: 0.3}, 300);
                  $('.reviews__load').addClass('js_loading');
                },
                success: function(response) {
                  setTimeout(function() {
                    if($(response).length) {
                      container.append( response );
                      container.animate({opacity: 1}, 300)
                      $('.reviews__load').removeClass('js_loading');
                    } else {
                      container.animate({opacity: 1}, 300)
                      $('.reviews__load').remove();
                    }
                  }, 1000);
                }
              });
              
          }
      });

  }); //end ready
  
  function ajaxCat (linkCat, pageID, catID) {
    $mainBox.animate({opacity: 0.3}, 300);

    $.post(params.ajax_url, 
      {
        action: 'get_cat',
        link: linkCat,
        page_id: pageID,
        cat_id: catID
      }, 
      function(response) {
       $mainBox.html(response).animate({opacity: 1}, 300);
     }); 
  }
 })();