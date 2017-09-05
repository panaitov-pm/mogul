 $(document).ready(function() {
      var $mainBox = $('.portfolio_content__inner');

     $('.portfolio__nav').on('click', 'a', function(event) {
       event.preventDefault();
       var linkCat = $(this).attr('href');
       var titleCat = $(this).text();

       document.title = titleCat;
       history.pushState({page_title: titleCat}, titleCat, linkCat);
       ajaxCat(linkCat);
     });
     /*Отслеживание события кнопок браузера вперед и назад*/
       window.addEventListener('popstate', function (e) {
         document.title = e.state.page_title;
         ajaxCat(location.href);
       }, false);

      function ajaxCat (linkCat) {
        $mainBox.animate({opacity: 0.3}, 300);

        $.post(params.ajax_url, 
          {
            action: 'get_cat',
            link: linkCat
          }, 
          function(response) {
           $mainBox.html(response).animate({opacity: 1}, 300);
         }); 
      }
  });