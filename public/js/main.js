$('.add-to-cart').on('click', function () {
event.preventDefault();


    $.ajax({
        url: BASEURL + "ebay/addCart",
        type: "GET",
        daraType: "html",
        data:{id: $(this).data('id'), price: $(this).data('price'), ship: $(this).data('ship'), img: $(this).data('img'), title: $(this).data('title')},
        success: function(data){

         }
    });


});
