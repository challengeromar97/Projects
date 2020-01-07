// On Scrolling
(function() {   
    window.onscroll = function(){scrolling()};
    scrolling();
    function scrolling() {
        var scrolled = document.body.scrollTop || document.documentElement.scrollTop ,
            nav_link = document.querySelectorAll("nav ul li"),
            home = document.getElementById("page-home").clientHeight,
            about = document.getElementById("page-about").clientHeight,
            skills = document.getElementById("skills").clientHeight,
            services = document.getElementById("page-services").clientHeight,
            hireme = document.getElementById("hireme").clientHeight,
            mywork = document.getElementById("page-mywork").clientHeight,
            testimonials = document.getElementById("page-testimonials").clientHeight,
            blogs = document.getElementById("page-blogs").clientHeight,
            contact = document.getElementById("page-contact").clientHeight,
            navbar = document.getElementById('navbarPage');

        if (scrolled > 90) {
            navbar.classList.add("bg-white");
            navbar.classList.remove("navbar-dark");
            navbar.classList.add("navbar-light");
        } else {
            navbar.classList.remove("bg-white");
            navbar.classList.add("navbar-dark");
            navbar.classList.remove("navbar-light");
        }
        for(var i=0; i<nav_link.length;i++)
            {nav_link[i].classList.remove("active");}
        
        if(scrolled >= 0        && scrolled <= home-1)
            {nav_link[0].classList.add("active")}
        
        if(scrolled >= home     && scrolled <= home+about+skills-1)
            {nav_link[1].classList.add("active")}
        
        if(scrolled >= home+about+skills    && scrolled <= home+about+skills+services+hireme-1)
            {nav_link[2].classList.add("active")}
        
        if(scrolled >= home+about+skills+services+hireme && scrolled <= home+about+skills+services+hireme+mywork-1)  
            {nav_link[3].classList.add("active")}
        
        if(scrolled >= home+about+skills+services+hireme+mywork   && scrolled <= home+about+skills+services+hireme+mywork+testimonials-1)
            {nav_link[4].classList.add("active")}
        
        if(scrolled >= home+about+skills+services+hireme+mywork+testimonials && scrolled <= home+about+skills+services+hireme+mywork+testimonials+blogs-1    )
            {nav_link[5].classList.add("active")}
        
        if(scrolled >= home+about+skills+services+hireme+mywork+testimonials+blogs   && scrolled <= home+about+skills+services+hireme+mywork+testimonials+blogs+contact-1       )
            {nav_link[6].classList.add("active")}
        
        if(scrolled >= home+about+skills+services+hireme+mywork+testimonials+blogs+contact )
            {nav_link[7].classList.add("active")}
    }
    
   
})();

(function() {
    var imgs = document.getElementsByClassName("card-img");
    var overlay = document.getElementById("overlay-img");
    function displayimg() {
        overlay.style.display = "flex";
    }
    function hideimg() {
        overlay.style.display = "none";
    }
    
    for (var i=0 ; i<imgs.length ; i++ ) {
        imgs[i].addEventListener("click", displayimg )
    }
    overlay.addEventListener("click", hideimg)
}
)();

(function() {
    var nav_link = document.querySelectorAll("#navbarPage ul li");
    for(var i=0; i< nav_link.length; i++) {
        nav_link[i].addEventListener("click", changeActive);
    }
    function changeActive() {
    var link_active = document.querySelector("#navbarPage ul li.active");
        link_active.classList.remove("active");
        this.classList.add("active")
    }
    
    
    
    
})();



// Select all links with hashes
$('a[href*="#page-"]')
  // Remove links that don't actually link to anything
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
