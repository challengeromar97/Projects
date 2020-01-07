
// All Colors Available For Theme
$(function(){

  // Get Your Fav Color Or Set It 
  if(localStorage.getItem("mainColor")) {
    let mainColor = localStorage.getItem('mainColor'),
        secondryColor = localStorage.getItem('secondryColor');
    document.documentElement.style.setProperty("--mainColor", mainColor, "important");
    document.documentElement.style.setProperty("--secondryColor", secondryColor, "important");
  } else {
    localStorage.setItem("mainColor","#5CDB95");
    localStorage.setItem("secondryColor","#38a9ff");
  }

  // All Colors Here
  var colors = [
    "orangered",
    "teal",
    "#38a9ff",
    "royalblue",
    "midnightblue",
    "Cyan",
    "goldenrod",
    "gold",
    "tomato",
    "deeppink",
    "#C3073F",
    "#5CDB95"
  ];

  // Add Colors To Html
  for(let i = 0; i < colors.length; i++) {

    // Change Color To Block With Style And Event On click
    let span1 = $("<span></span>"),
        span2 = $("<span></span>"),
        spanS1= span1.css({
          "width":"50px",
          height: "50px",
          margin: "5px",
          display: "inline-block",
          backgroundColor: colors[i]
        }),
        spanS2 = span2.css({
          "width":"50px",
          height: "50px",
          margin: "5px",
          display: "inline-block",
          backgroundColor: colors[i]
        }),
        spanR = spanS1.on("click", function(){
          document.documentElement.style.setProperty("--secondryColor", colors[i], "important");
          localStorage.setItem("secondryColor",colors[i]);
        }),
        spanL = spanS2.on("click", function(){
          document.documentElement.style.setProperty("--mainColor", colors[i], "important");
          localStorage.setItem("mainColor",colors[i]);
        });

// Append This Span
$("#rightSettingsContainer .settings").append(spanR);

// Append This Span
$("#leftSettingsContainer .settings").append(spanL);
    
  }
});

// Show Setting
$("#leftSettingsContainer i").on("click", function() {
  var set = $(this).parent();
  if( set.css("left") == "-316px") {
    set.css("left","0px")
  } else {
    set.css("left","-316px")
  }
});
// Show Setting
$("#rightSettingsContainer i").on("click", function() {
  var set = $(this).parent();
  if( set.css("right") == "-316px") {
    set.css("right","0px")
  } else {
    set.css("right","-316px")
  }
});

/*
// Change Page Title
function pageName() {
  var pageName = window.location.pathname.substr(7) || "NewsFeed";
  $('#page-title').text(pageName);
}
*/

// Close all Other Floats 
function closeAll() {

  // Hide All Notification Container 
  $('.list').fadeOut();

  // Remove Color From Other Notification Icon 
  $('.list').parent().find('i').removeClass('mainColor');

  // Hide Profile Container 
  $('#profile-account').slideUp();

  // Remove Color Class
  $('#profile-account').parent().find('#profile-name i').removeClass('mainColor');

  if ($('#left-sidebar').css("width") != "70px") {

    toggleMenu($('#left-sidebar .menu .menuBtn'));

  } else if ($('#right-sidebar').css("width") != "70px") {

    toggleMenu($('#right-sidebar .menu .menuBtn'));

  }


}

//toggle Menu 
function toggleMenu(sideBar) {
  var thisone;
  sideBar.length > 0 ? thisone = sideBar : thisone = $(this);

  var menu = thisone.parent().parent(),   // Menu Container 
    spans = menu.find('.menu span'),    // Spans Behind Icons 
    logoName = menu.find('.logo span:last-of-type'), // Logo Name 
    menuBtn = thisone.find('i'),        // Menu Btn
    menuSide, // Detrmine Left Or Right
    dirProp = {}; // And Save it in Object 

  // Check If It Right Or Left Side Bar 
  menu.attr('id') == 'left-sidebar' ? menuSide = 'left' : menuSide = 'right';

  if (menu.css('width') == '70px') {

    // Hide All Floats Section 
    closeAll();

    // Declare A property For Left Or right To -60px 
    dirProp[menuSide] = '-60px';

    // Start Animation Of Container 
    menu.animate(dirProp, 'fast', function () {

      // Toggle Class In Button Menu 
      menuBtn.removeClass('fa-bars').addClass('fa-times');

      //Show Logo Name
      logoName.css('display', 'inline');

      // Move To Left Animation 
      menu.css('width', '270px');

      // Declare A property For Left Or right To -270px 
      dirProp[menuSide] = '-260px';

      // Set Left Or Right To -270px
      menu.css(dirProp);

      // Declare A property For Left Or right To 0px 
      dirProp[menuSide] = '0px';

      // Show Spans Behind Icons
      spans.css('display', 'inline');

    });

    // Return To Default Position
    menu.animate(dirProp);

  } else {

    // Declare A property For Left Or right To -60px 
    dirProp[menuSide] = '-260px';

    // Start Animation Of Container 
    menu.animate(dirProp, 'fast', function () {

      // Toggle Class In Button Menu 
      menuBtn.removeClass('fa-times').addClass('fa-bars');

      //Show Logo Name
      logoName.css('display', 'none');

      // Change Width to 70px 
      menu.css('width', '70px');

      // Declare A property For Left Or right To -60px 
      dirProp[menuSide] = '-60px';

      // Set Left Or Right To -270px
      menu.css(dirProp);

      // Declare A property For Left Or right To 0px 
      dirProp[menuSide] = '0px';

      // Show Spans Behind Icons
      spans.css('display', 'none');

    });

    // Return To Default Position
    menu.animate(dirProp);
  }
}

//Toggle Menu Height
function toggleMenuHeight() {

  // sidebar Container 
  var tar = $(this).parent();

  // Check If Container Is open or closed
  if (tar.css("height") == "70px") {
    tar.animate({ height: "100%" })
  } else {
    if (tar.css("width") != "70px") {
      toggleMenu(tar.find('.menuBtn'));
    }
    tar.animate({ height: "70px" })
  }

}

// Toggle Notifcation Container 
function toggleNotifi() {

  var icon = $(this), // Notification Icon That pressed
    notif = $(this).parent().find('.list'), // Notification Container  
    otherNoti = $(this).parent().siblings(); // Other Notification parent

  // Hide Other Notification Container 
  otherNoti.find('.list').fadeOut();

  // Remove Color From Other Notification Icon 
  otherNoti.find('i').removeClass('mainColor');

  // Check To Close Or To Open The Notification Container
  if (notif.css("display") == "none") {

    // Hide All Floats Section 
    closeAll();

    // Show Notify Container
    notif.fadeIn();

    // Add Color From Notify icon
    icon.addClass('mainColor');

  } else {

    // Hide Notify Container
    notif.fadeOut();

    // Remove Color From Notify icon
    icon.removeClass('mainColor');

  }

}

// Toggle Profile Account Container
function toggleProfile() {

  // Profile Container 
  var profileCont = $(this).parent().parent().find('#profile-account'),
    icon = $(this);

  // Check And Toggle Display 
  if (profileCont.css('display') == "block") {

    // Hide Profile Container
    profileCont.slideUp();

    // Remove Color Class
    icon.removeClass('mainColor');

  } else {

    // Hide All Floats Section 
    closeAll();

    // add Color Class
    icon.addClass('mainColor');

    // Show Profile Container
    profileCont.slideDown();
  }
}

// Function To Let The Scroll Bar On bottom
function setItDown(tar) {
  tar.scrollTop(tar.prop('scrollHeight'));
}

// On click On menu Call toggle Menu Function
$('.menu .menuBtn').on('click', toggleMenu);

// Toggle Menu Height On Click
$('.sidebar .logo').on("click", toggleMenuHeight);

// On click On Icons Call toggle toggleNotifi Function
$('#iconsContainer .icons i').on('click', toggleNotifi);

// Toggle Profile Container On Click
$('#profile-name i').on("click", toggleProfile);

// Let Scroll Bar On Bottom In Messegs Section
setItDown($('#right-sidebar .menu'));

/*
// Change Page Title
$('a[routerLink]').on("click", pageName);
pageName();
*/


