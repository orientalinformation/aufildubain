$(document).ready(function() {
  $('.grid-inspi').masonry({
    itemSelector: '.grid-item',
    horizontalOrder: false,
  });
  // $('.grid-details').masonry({
  //   itemSelector: '.grid-item',
  //   horizontalOrder: false,
  // });

  var titleDetail = $('.grid').data('zoomTitle');
  $('.grid-item.zoom-gallery a').append('<div class="zoom-loop"><img src="/images/Zoomicon.png" class="img-fluid" alt=""></div>');
  $('.grid-item.zoom-gallery a').mouseover(function(){
    var $elm = $(this).find('.zoom-loop');
    if (!$elm.hasClass('animated'))  $elm.toggleClass('animated zoomInUp');
  });
  $('.grid-item.zoom-gallery a').mouseout(function(){
    $(this).find('.zoom-loop').removeClass('animated zoomInUp');
  })
  $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
          verticalFit: true,
          titleSrc: function(item) {
            return '<p>' + item.el.attr('title') + '</p>';
          }
        },
        tLoading: 'Chargement...',
        gallery: {
          enabled: true,
        },
        zoom: {
          enabled: true,
          duration: 300, // don't foget to change the duration also in CSS
            easing: 'ease-out',
          opener: function(element) {
            // return element.find('img');
            return element.is('.item-block') ? element : element.find('.item-block');
          }
        }
  });
  $('.zoom-gallery').click(function(){
      $('.mfp-content').append('<div class="fill-zoom">' + titleDetail +'</div>');
      $('.mfp-content').addClass('animated pulse');
  });
  $('a.btn-gallery').on('click', function(e) {
    e.preventDefault();
    
    var gallery = $(this).attr('href');
    var InterVar;

    $(gallery).magnificPopup({
      delegate: 'a',
      removalDelay: 500,
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile animated bounceIn',
        image: {
          verticalFit: true,
          titleSrc: function(item) {
            return '<p>' + item.el.attr('title') + '</p>';
          }
        },
        tLoading: 'Chargement...',
        gallery: {
          enabled: true,
        },
        callbacks: {
            open: function () {
              InterVar = setInterval(function () {
                $.magnificPopup.instance.next();
              }, 5000);
            },
            close: function() {
              clearInterval(InterVar);
            },
            imageLoadComplete: function() {
              if ($('.fill-zoom').length == 0) {
                $('.mfp-content').append('<div class="fill-zoom">' + titleDetail +'</div>');
                  $('.mfp-content').addClass('animated fadeIn');
              }
            },
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
          },
          midClick: true

        
    }).magnificPopup('open');
  });
    
});

$(window).load(function(){
  $('.loader-inspirations').fadeOut(1000);
  $('.grid').fadeIn(1500);
  $('.grid').fadeTo( 1000, 1);
});