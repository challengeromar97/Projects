
    // Function To Let The Scroll Bar On bottom
    function setItDown(tar) {
        tar.scrollTop(tar.prop('scrollHeight'));
      }
  
      //Comments Toggle 
      function commentsToggle() {
  
        var btn = $(this),
            commentsContainer = btn.parent().parent().parent().parent().find('.justForSomeAnimation');
  
            commentsContainer.slideToggle();
            if( btn.hasClass('mainColor')) {
  
              btn.removeClass('mainColor');
            } else {
            btn.addClass('mainColor');
            }
      }
  
      // Let Scroll Bar On Bottom In Messegs Section
      setItDown($(".all-comments"));
  
      // Toggle Comments
      $('.posts-com').on("click", commentsToggle)

      $('.post-det-icon').on("click", function() {
        $(this).parent().parent().parent().parent().siblings().find('.post-det-cont').fadeOut();
        $(this).parent().find('.post-det-cont').fadeToggle();
      });

      // Onclick Submit Comment Form
      $('.submit_comment').on("click",function() {
        $(this).parent().parent().submit();
      });

      // Hide Post
      $('.hide-post').on("click",function() {
        $(this).parent().parent().parent().parent().parent().parent().fadeOut();
      });

      // Hide Comment
      $('.hide-comment').on("click",function() {
        $(this).parent().parent().parent().parent().parent().fadeOut();
      });