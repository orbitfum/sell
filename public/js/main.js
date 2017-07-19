$('.add-to-cart').on('click', function () {
event.preventDefault();


    $.ajax({
        url: BASEURL + "ebay/addCart",
        type: "GET",
        daraType: "html",
        data:{id: $(this).data('id'), price: $(this).data('price'), ship: $(this).data('ship')},
        success: function(data){
        return true;
        }
    });


});
