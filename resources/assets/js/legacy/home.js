
function resizeRegularSlider() {
  setTimeout(function() {
    var maxHeight = 0;
    $('.regular .slick-slide .item-slider').each(function () {
      if (this.offsetHeight > maxHeight) {
        maxHeight = this.offsetHeight;
      }
    });
    $('.regular .slick-slide .item-slider').each(function () {
      this.style.height = maxHeight + 'px';
    });
  }, 100);
  
}

$(document).ready(function(){

  $(".regular").slick({
    dots: false,
    arrows: false,
    autoplay: false,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow:3,
          initialSlide: 2,
          infinite: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          centerMode: true,
          infinite: false,
          // variableWidth: true,
          initialSlide: 1,
          slidesToShow: 2,
          arrows: true,
          prevArrow: '',
          nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
          centerPadding: '45px'

        }
      },
      {
        breakpoint: 640,
        settings: {
          centerMode: true,
          // variableWidth: true,
          initialSlide: 0,
          slidesToShow: 1,
          infinite: false,
          arrows: true,
          prevArrow: '',
          nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
          centerPadding: '45px'

        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          centerMode: true,
          infinite: false,
          variableWidth: true,
          initialSlide: 0,
          slidesToShow: 2,
          prevArrow: '',
          nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
          centerPadding: '15px'
        }
      }
    ]
  });
  $(".conseils").slick({
    dots: false,
    arrows: false,
    autoplay: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: true,
          infinite: false,
          // variableWidth: true,
          initialSlide: 0,
          slidesToShow:1,
          arrows: true,
          prevArrow: '',
          nextArrow: '<img src="/images/slide-items/icons/arrows-slide.png" alt="">',
          // centerPadding: '510px'

        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          centerMode: true,
          infinite: false,
          variableWidth: true,
          initialSlide: 0,
          slidesToShow: 2,
          prevArrow: '',
          nextArrow: '<img src="../images/slide-items/icons/arrows-slide.png" alt="">',
          centerPadding: '15px'
        }
      }
    ]
  });
  
  if ($('body.home .slider .slider-wrapper img').length > 1) {
    $('body.home .slider .slider-wrapper').slidesjs({
      width: 1920,
      height: 875,
      navigation: {
        active: false
      },
      pagination: {
        effect: "fade"
      },
      effect: {
        fade: {
          speed: 700,
          crossfade: true
        }
      },
      play: {
        effect: "fade",
        interval: 2000,
        auto:true,
        pauseOnHover: false,
        restartDelay: 1000
      }
    });
  }
  $(".regular").imagesLoaded(function () {
    resizeRegularSlider();
  });

  $(window).resize(function() {
    resizeRegularSlider();
  });
});