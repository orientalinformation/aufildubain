var windowHeight = $(window).height();

wow = new WOW({
    animateClass: 'animated',
    offset: 100,
});
wow.init();

function is_touch_device() {
    var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
    var mq = function (query) {
        return window.matchMedia(query).matches;
    }

    if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
        return true;
    }

    // include the 'heartz' as a way to have a non matching MQ to help terminate the join
    // https://git.io/vznFH
    var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
    return mq(query);
}


$(document).ready(function () {
    // Hovering is not for touch device
    $('ul.navbar-nav li.dropdown').hover(function () {
        $elm = $(this).find('.dropdown-menu');
        if (window.innerWidth >= 768) {
            $elm.show(0,function() {
                $(this).addClass('show');
                $elm.addClass('show');
                $elm.css('display', '');
            });
        }
    }, function () {
        $elm = $(this).find('.dropdown-menu');
        if (window.innerWidth >= 768) {
            $elm.removeClass('show');
            $(this).removeClass('show');
        }
    });

    $('.nav-item.dropdown  a.nav-link.dropdown-toggle').click(function(e) {
        if (window.innerWidth >= 768) {
            e.preventDefault();
            window.location.href = $(e.target).attr('href');
        }
    });

    $('.navbar-toggler').click(function () {
        $(this).toggleClass('collapsed');
        $('body').toggleClass('show-backdrop');
    });
    $('.backdrop').click(function () {
        $('.navbar-toggler').click();
    });
    $('.img-holder').imageScroll({
        container: $('#sectionBottom'),
    });
});
