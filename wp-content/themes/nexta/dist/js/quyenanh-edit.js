$(document).ready(function () {
    $('.tabs-control ul li').click(function () {
        $('.tabs-control ul li').removeClass('active');
        $(this).addClass('active');
        var id = $(this).find('a').attr('href');
        $('.tabs-content .tab-pane').removeClass('active');
        $(id).addClass('active');
        return false;
    });
});


