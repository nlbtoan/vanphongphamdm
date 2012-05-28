$(document).ready(function(){
    $("a.switch-thumb").toggle(function(){
        $(this).addClass("swap");
        $("div.display").fadeOut("fast", function() {
            $(this).fadeIn("fast").addClass("thumb-view");
        });
    }, function () {
        $(this).removeClass("swap");
        $("div.display").fadeOut("fast", function() {
            $(this).fadeIn("fast").removeClass("thumb-view");
        });
    });
});