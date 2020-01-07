// Function To Let The Scroll Bar On bottom
function setItDown(tar) {
    tar.scrollTop(tar.prop('scrollHeight'));
  }

  //Comments Toggle 
  function commentsToggle() {

    var btn = $(this),
        commentsContainer = btn.parent().parent().parent().parent().parent().find('.justForSomeAnimation');

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

  // lOCATE UP
  $('#bgU').on("click", function() {
    if( $('#pBG').css("background-position-y") != "0px" ) {
      $('#pBG').animate({backgroundPositionY:'+=30px'})
    }
  })
  
  // lOCATE Down
  $('#bgD').on("click", function() {
    if( $('#pBG').css("background-position-y") != "-390px" ) {
      $('#pBG').animate({backgroundPositionY:'-=30px'})
    }
  })