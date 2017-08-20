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

        $('html, body').animate({
            scrollTop: $(".infoseler").offset().top
        }, 500);
        $(this).addClass('selector-error');
        $('#'+ vari).addClass('selector-error');
        $('#'+ err).fadeIn().css('display', 'inline-block');
        $('#' + vari).on('focusin', function () {
            $(this).removeClass('selector-error');
            $('#'+ err).fadeOut().css('display', 'none');
        });
    }
}

$('#btnpay').on('click',function(){
    event.preventDefault();
    var trCount = $('.cart-item').length;
    for(var i= 0 ;i < trCount; i ++){
        var itemid = $('.cart-item').eq(i).find('#itemid').val();
        var itemAttributes = $('.cart-item').eq(i).find('#itemAttributes').val();
        var currentPrice = $('.cart-item').eq(i).find('#currentPrice').val();
        var count = $('.cart-item').eq(i).find('#update-cart').val();

        if(itemid != "" || itemid != null){
            $.ajax({
                url: BASEURL + "cart/checkout",
                type: "GET",
                daraType: "html",
                data: {
                    itemid : itemid,
                    itemAttributes : itemAttributes,
                    currentPrice: currentPrice,
                    count : count,
                },
                success: function (data) {
                    if (data == 0) {
                        i = i - 1;
                    }
                }
            });
        }
    }
    location.reload();
});


$('.mycart').on('click', function () {
    event.preventDefault();

     exists = false;
        vali1 = $('#vali1').val();
        vali2 = $('#vali2').val();
        vali3 = $('#vali3').val();
        vali4 = $('#vali4').val();
        var attri = "";
         var price = "";
     if(vali1 == '^^^SELECT^^^' || vali2 == '^^^SELECT^^^' || vali3 == '^^^SELECT^^^' || vali4 == '^^^SELECT^^^'){
         exists = false;
     }else{
         exists = true;
         var available = 0;
            if(typeof alljson["Item"]['Variations'] !== 'undefined'){
                var validationCount =parseInt($('#validationCount').val()) - 1;
                if(validationCount == 1){
                    var selectVal = $('.cn')[0]['value'];
                    lisInfo = alljson["Item"]['Variations'];
                    $.each(variations, function (k1, v1) {
                        if(v1['VariationSpecifics']['NameValueList']['Value'] == selectVal){
                            attri = v1['VariationSpecifics']['NameValueList']['Name'] + ":" + selectVal;
                            price = v1['StartPrice'];
                        }
                    });
                }else{
                    var keys = [];
                    for(var i = 1; i <= validationCount; i++){
                        keys.push($('#vali' + i.toString())[0]['value']);
                    }
                    lisInfo = alljson["Item"]['Variations'];
                    $.each(variations, function (k1, v1) {
                        var flag = true;
                        var attriList = "";
                        for(var j = 0; j < validationCount; j++){
                            if(v1['VariationSpecifics']['NameValueList'][j]['Value'] != keys[j]){
                                attriList = v1['VariationSpecifics']['NameValueList'][j]['Name'] + ":" + keys[j] + "," + attriList;
                                price = v1['StartPrice'];
                                flag = false;
                            }
                        }
                        if(flag == true){
                            attri = attriList;
                        }
                    });
                }
            }else{
                attri = "";
                price = alljson['Item']['CurrentPrice'];
            }
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
            val4: vali4,
            attri: attri,
            realprice : price,
            quntity: $('.qty').val(),
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
                window.location = 'http://localhost:8000/cart/mycart';
            }
            
        }
    });
    }

});


$('.add-to-cart').on('click', function () {
    event.preventDefault();

     exists = false;
        vali1 = $('#vali1').val();
        vali2 = $('#vali2').val();
        vali3 = $('#vali3').val();
        vali4 = $('#vali4').val();
        var attri = "";
        var price = "";
     if(vali1 == '^^^SELECT^^^' || vali2 == '^^^SELECT^^^' || vali3 == '^^^SELECT^^^' || vali4 == '^^^SELECT^^^'){
         exists = false;
     }else{
         exists = true;

         var available = 0;
            if(typeof alljson["Item"]['Variations'] !== 'undefined'){
                var validationCount =parseInt($('#validationCount').val()) - 1;
                if(validationCount == 1){
                    var selectVal = $('.cn')[0]['value'];
                    lisInfo = alljson["Item"]['Variations'];
                    $.each(variations, function (k1, v1) {
                        if(v1['VariationSpecifics']['NameValueList']['Value'] == selectVal){
                            attri = v1['VariationSpecifics']['NameValueList']['Name'] + ":" + selectVal;
                            price = v1['StartPrice'];
                        }
                    });
                }else{
                    var keys = [];
                    for(var i = 1; i <= validationCount; i++){
                        keys.push($('#vali' + i.toString())[0]['value']);
                    }
                    lisInfo = alljson["Item"]['Variations'];
                    $.each(variations, function (k1, v1) {
                        var flag = true;
                        var attriList = "";
                        for(var j = 0; j < validationCount; j++){
                            if(v1['VariationSpecifics']['NameValueList'][j]['Value'] != keys[j]){
                                attriList = v1['VariationSpecifics']['NameValueList'][j]['Name'] + ":" + keys[j] + "," + attriList;
                                price = v1['StartPrice'];
                                flag = false;
                            }
                        }
                        if(flag == true){
                            attri = attriList;
                        }
                    });
                }
            }else{
                attri = "";
                price = alljson['Item']['CurrentPrice'];
            }
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
            val4: vali4,
            attri: attri,
            realprice : price,
            quntity: $('.qty').val(),
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
                var number = parseInt($("#cart").text(),10);
                var newValue = number + 1;
                $('#cart').text(newValue);


                var itemImg = $('.main-image').find('img').eq(0);
                flyToElement($(itemImg), $('#cart'));
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

$('.qty').on('focusout', function () {
    qty = parseInt($(this).val(),10);
    price = parseFloat($(".pricexl b").data('price').toFixed(2));
    orprice = parseFloat($(".infotextprice span").data('price')).toFixed(2);

    newprice = parseFloat(qty * price).toFixed(2);
    neworprice = parseFloat(qty * orprice).toFixed(2);
    $('.pricexl b').text(newprice);
    $('.infotextprice span').text(neworprice);
});


function modal(name, button) {
    var model = $(name);
    var btn = $(button);

    var close = $('.close');

    $(btn).on('click', function () {
       $(model).css('display', 'block');
    });

    $(close).on('click', function () {
        $(model).css('display', 'none');
    });

    var a=function(event) {
        if (event.target == model) {
            $(model).css('display', 'none');
        }
    }
    window.addEventListener('click',a);
    window.addEventListener('keydown', keyDownEsc);
    function keyDownEsc(esc) {
        var keyCode = esc.keyCode;
        if(keyCode==27) {
            $(model).css('display', 'none');
        }
    }
}


//modal

$(document).ready(function() {

$('.has-error').on('focus' ,function () {
    $(this).removeClass();
    id = $(this).attr('id');
    $(this).on('keydown', function () {
        $("[data-id='" + id + "']").fadeOut(550);
    });

});

    $('#phone').keypress(function(e) {
        if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))   {      $("#phone-valid").html("ספרות בלבד!").show().fadeOut(3000);
        return false;

        }
    });

});


function validateAll(){
    var email = $("#email").val();
    var phone = $("#phone").val();
    var spassword = $("#password").val();
    spassword  = spassword.replace(/./g, '*');
    var matchPass = $("#password_confirmed").val();
    matchPass  = matchPass.replace(/./g, '*');

    checkEmail(email);
    checkSPassword(spassword);
    checkMatchPass(matchPass);
    checkphone(phone);

    return false;
}

function checkEmail(email)
{
    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if(!pattern.test(email)){
        $(".email_error").show();
        $('#email').addClass('has-error');
    }else{
        $(".email_error").hide();
        $('#email').removeClass('has-error');
    }
}

function checkSPassword(password){
    var pattern = /^\S*(?=\S{6,})\S*$/;
    if(!pattern.test(password)){
        $(".spassword_error").show();
        $('.password').addClass('has-error');
    }else{
        $(".spassword_error").hide();
        $('.password').removeClass('has-error');
    }
}

function checkMatchPass(match){
    var spassword = $(".password").val();
    spassword  = spassword.replace(/./g, '*');
    var matchPass = $("#password_confirmed").val();
    matchPass  = matchPass.replace(/./g, '*');
    if(spassword != matchPass){
        $(".mpassword_error").show();
        $('#password_confirmed').addClass('has-error');
    }else{
        $(".mpassword_error").hide();
        $('#password_confirmed').removeClass('has-error');
    }
}

function checkphone(phone){
    var pattern = /^\S*(?=\S{8,})\S*$/;
    if(!pattern.test(phone)){
        $(".erphone_error").show();
        $('#phone').addClass('has-error');
    }else{
        $(".erphone_error").hide();
        $('#phone').removeClass('has-error');
    }
}

//cart


$('.remove-item').on('click', function () {
    event.preventDefault();
    $.ajax({
        url: BASEURL + "cart/remove-item",
        type: "GET",
        daraType: "html",
        data:{id: $(this).data('id')},
        beforeSend: function () {
            $('.spinner-bg').css('display', 'block');
        },
        success: function(data){
            setTimeout(function () {
                location.reload();
            }, 1200);
        }
    });
});


$('#update-cart').on('change', function () {
    $('#update-cart').on('focusout', function () {
    $.ajax({
        url: BASEURL + "cart/update-item",
        type: "GET",
        daraType: "html",
        data:{id: $(this).data('id'), quantity: $(this).val()},
        beforeSend: function () {
            $('.spinner-bg').css('display', 'block');
        },
        success: function(data){
            setTimeout(function () {
                 location.reload();
            }, 1200);
        }
    });});
});

$('#customerName, #city, #address').keypress(function(key) {
    error = $(this).attr('id');
    if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45) && (key.charCode != 32)) {
        $("."+error).html("אותיות באנגלית בלבד!").show().fadeOut(3500);
        return false;
    }
});