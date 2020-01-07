$(document).ready(() => {

    $('div[data-url]').on("click", function() {
        url = $(this).attr("data-url");
        show_video(url);
    });
    $('.play-video').on("click", function() {
        hide_video();
    });
    $(document).on("keydown", function(e) {
        if(e.keyCode === 27){
            hide_video();
        }
    });

    function show_video(url) {
        $('.play-video iframe').attr("src",url);
        $('.play-video').css({"display":"flex"});
    }

    function hide_video() {
        $('.play-video').css({"display":"none"});
    }

});