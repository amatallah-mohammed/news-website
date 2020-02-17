
$(document).ready(function() {

    // News Ticker
    var dd = $('.vticker').easyTicker({
        direction: 'up',
        easing: 'easeInOutBack',
        speed: 'slow',
        interval: 2000,
        height: '43px',
        visible: 1,
        mousePause: 1,
        controls: {
            up: '.up',
            down: '.down'
        }
    }).data('easyTicker');

    // aside li hover effect
    $('aside li').mouseenter(function() {
        $(this).find('a').addClass('green-border');
    });
    $('aside li').mouseleave(function() {
        $(this).find('a').removeClass('green-border');
    });

    // Today's Date
    var d_names = new Array("الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
    var m_names = new Array("يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو", "يوليو", "اغسطس", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");

    var d = new Date();
    var curr_day = d.getDay();
    var curr_date = d.getDate();
    var curr_month = d.getMonth();
    var curr_year = d.getFullYear();

    $("#date-holder").html(d_names[curr_day] + " " + curr_date + " " + m_names[curr_month] + " " + curr_year + " م");

    // Box Move
    $(document).scroll(function() {
        var top_offset = $(window).height() + $(document).scrollTop();
        var box_offset = $('.move-box').offset().top;

        if (top_offset >= box_offset) {
            $('.move-box').animate({top: 0, opacity: 1}, 600);
        }
    });

    var max = $('#more').attr('rel') + 1;
    for (var i = 0; i < max; i++) {
        if (i > 10) {
            $('#' + i + "sh").hide();
        }
    }

    $('#more').click(function() {
        var limit = $('#more').attr('rel');
        var min = parseInt($('#more').attr('rell'));
        var max = min + 11;
        var maxx = min + 10;

        for (var i = min; i < max; i++) {
            $('#' + i + "sh").show();
        }
        if (maxx >= limit) {
            $('#more').hide();
        }
        $('#more').attr('rell', maxx);
    });

});