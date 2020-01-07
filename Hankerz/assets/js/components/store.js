$(document).ready(function() {

    $('.tab-title').click(function () {
        $(this).siblings('.tab-items').slideToggle("fast");
    });


    $('.list').click(function(){
        $('.list').addClass("active");
        $('.grid').removeClass("active");
        $('.product-container').removeClass('col-6 col-md-4').addClass('col-12');
        $('.product-overlay').css("display","none");
        $('.product').css("display","flex");
        $('.prod-details .p-desc').css("display","block");
        $('.prod-details .hk-btn').css("display","inline-block");
        
        
    });
    $('.grid').click(function(){
        $('.grid').addClass("active");
        $('.list').removeClass("active");
        $('.product-container').removeClass('col-12').addClass('col-6 col-md-4');
        $('.product-overlay').css("display","flex");
        $('.product').css("display","block");
        $('.prod-details .p-desc').css("display","none");
        $('.prod-details .hk-btn').css("display","none");
    });
    


});