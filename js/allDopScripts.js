$(document).ready(function(c) {

    $('.close1').on('click', function(c){
        $('.cart-header').fadeOut('slow', function(c){
            $('.cart-header').remove();
        });
    });	

    // Slideshow 4
    $("#slider4").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });
});

// function show_hide_list () {
//     var menu_ul = $('.menu_drop > li > ul'),
//     menu_a  = $('.menu_drop > li > a');

//     menu_ul.hide();

//     menu_a.click(function(e) {
//     e.preventDefault();
//     if(!$(this).hasClass('active')) {
//         menu_a.removeClass('active');
//         menu_ul.filter(':visible').slideUp('normal');
//         $(this).addClass('active').next().stop(true,true).slideDown('normal');
//     } else {
//         $(this).removeClass('active');
//         $(this).next().stop(true,true).slideUp('normal');
//     }
//     });
// }