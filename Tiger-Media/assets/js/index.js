// Loading Screen


// Add Spell Checked Attribute to inputs
$(function() {
     $("input").attr({
     spellcheck: "false",
     autocomplete: "off"
     });
})

// Change Components of Navbar
$("body >section").css({"display":"none"});
$("section#tiger-newsfeed").css({"display":"block"});

$('#tiger-navbar a[routerLink]').on("click", function (){
     changeMainComp($(this));
});

function changeMainComp(compl) {
    $("body >section").css({"display":"none"});
    var comp = "section#tiger-" + compl.attr("routerLink").substring(1);
     $(comp).css({"display":"block"});
}

// Change Components of Profile
$("#tiger-profile #profilePage >section").css({"display":"none"});
$("#tiger-profile #profilePage >section#tiger-timeline").css({"display":"block"});

$('#tiger-profile #profilePage a[routerLink]').on("click", function (){
     changeProfileComp($(this));
});

function changeProfileComp(compl) {
    $("#tiger-profile #profilePage >section").css({"display":"none"});
    var comp = "#tiger-profile #profilePage >section#tiger-" + compl.attr("routerLink").substring(1);
     $(comp).css({"display":"block"});
}

