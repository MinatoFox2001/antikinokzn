
$('a').click(function (event) {
    event.preventDefault();

    let id = $(this).attr('href'),
        top = $(id).offset().top;
    $('body, html').animate({scrollTop: top}, 1000);
});

$('.faq-arrow').click(function () {
    if ($(this).hasClass('active')) {
        $(this).parents('.faq-block').find('.faq-content').slideUp();
        $(this).removeClass('active');
    } else {
        $(this).parents('.faq-block').find('.faq-content').slideDown();
        $(this).addClass('active');
    }
});

$('.reservation').click(function () {
    $('body').css('overflow', 'hidden');

    var price = parseInt($(this).parents('.reservation-block').find('input[name=amount]').val());
    let title = $(this).parents('.reservation-block').find('input[name=title]').val();
    let subtitle = $(this).parents('.reservation-block').find('input[name=subtitle]').val();

    $('.reservation-modal').fadeIn();

    $('#reservation-title').html(title);
    $('#reservation-subtitle').html(subtitle);
    $('#total_price').html(price);
    $('#reservation-price').val(price);
    $('input[name=product]').val(title);

    $('.reservation-close').click(function (e) {
        $('body').css('overflow', 'auto');
        e.preventDefault();
        $('.reservation-modal').fadeOut();
    });

    $('.additionally').click(function () {
        let additionally = 0;

        $('.additionally:checked').each(function () {
            additionally+=parseInt($(this).data('price'),10);
        });

        $('#total_price').html(price + additionally);
        $('#reservation-price').val(price + additionally);
    });
});