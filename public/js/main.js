function flyToElement(flyer, flyingTo) {
    var $func = $(this);
    var divider = 15;
    var flyerClone = $(flyer).clone();
    $(flyerClone).css({
        position: 'absolute',
        top: $(flyer).offset().top + "px",
        left: $(flyer).offset().left + "px",
        opacity: 1,
        'z-index': 1000
    });
    $('body').append($(flyerClone));
    var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width() / divider) / 2;
    var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height() / divider) / 2;

    $(flyerClone).animate({
            opacity: 0.4,
            left: gotoX,
            top: gotoY,
            width: $(flyer).width() / divider,
            height: $(flyer).height() / divider
        }, 1000,
        function () {
            $(flyingTo).fadeOut('fast', function () {
                $(flyingTo).fadeIn('fast', function () {
                    $(flyerClone).fadeOut('fast', function () {
                        $(flyerClone).remove();
                    });
                });
            });
        });
}

function controlVari(vali, vari, err){

    if(vali == '^^^SELECT^^^'){
        $(this).addClass('selector-error');
        $('#'+ vari).addClass('selector-error');
        $('#'+ err).fadeIn().css('display', 'inline-block');
        $('#' + vari).on('focusin', function () {
            $(this).removeClass('selector-error');
            $('#'+ err).fadeOut().css('display', 'none');
        });
    }
}



$('.add-to-cart').on('click', function () {
    event.preventDefault();

     exists = false;
        vali1 = $('#vali1').val();
        vali2 = $('#vali2').val();
        vali3 = $('#vali3').val();
        vali4 = $('#vali4').val();
     if(vali1 == '^^^SELECT^^^' || vali2 == '^^^SELECT^^^' || vali3 == '^^^SELECT^^^' || vali4 == '^^^SELECT^^^'){
         exists = false;
     }else{
         exists = true;
     }

    controlVari(vali1,'vali1','er1');
    controlVari(vali2,'vali2','er2');
    controlVari(vali3,'vali3','er3');
    controlVari(vali4,'vali4','er4');


    if(exists){

    $.ajax({
        url: BASEURL + "ebay/addCart",
        type: "GET",
        daraType: "html",
        data: {
            id: $(this).data('id'),
            price: $(this).data('price'),
            ship: $(this).data('ship'),
            img: $(this).data('img'),
            title: $(this).data('title'),
            val1: vali1,
            val2: vali2,
            val3: vali3,
            val4: vali4
        },
        beforeSend: function () {
            $('.btn-spinner').css('display', 'block');
        },
        success: function (data) {
            if (data == 0) {
                setTimeout(function () {
                    $('.btn-spinner').css('display', 'none');
                }, 1200);

            } else {
                $("#cartHolder").load(location.href + " #cartHolder");
                var itemImg = $('.main-image').find('img').eq(0);
                flyToElement($(itemImg), $('.my-account-title'));
                setTimeout(function () {
                    $('.btn-spinner').css('display', 'none');

                    $('.add-to-cart').stop().css('opacity', '0').html(function (_, oldText) {
                        return oldText == 'הוסף לעגלה' ? '<div class="btn-spinner"></div> !נוסף לעגלה' : '<div class="btn-spinner"></div> !נוסף לעגלה'
                    }).animate({
                        opacity: 1
                    }, 2000);
                }, 1200);
            }

        }
    });
    }

});


