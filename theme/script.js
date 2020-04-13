$(function(){

    $("#home").click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: ($('#homeArea').offset().top)
        },500);
    });

    $("#about").click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: ($('#offer').offset().top)
        },500);
    });

    $("#resources").click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: ($('#functionalities').offset().top)
        },500);
    });

    $("#plans").click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: ($('#plans-area').offset().top)
        },500);
    });

    $("#blog").click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: ($('#blog-area').offset().top)
        },500);
    });


});