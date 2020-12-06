// Image to Lightbox Overlay 
$(".img").on("click", function() {
$("#overlay")
    .css({backgroundImage: `url(${this.src})`})
    .addClass("open")
    .one("click", function() { $(this).removeClass("open"); });
});

// Toggle pages on mobile
$("#toggleLeftSidebar").on("click", function() {
    // $("#leftSidebar").toggleClass("hide");
    // $("#leftSidebar").toggleClass("position-absolute");
    $("#leftSidebar").toggleClass("show");
    $("#toggleLeftSidebar").toggleClass("push");
    $("#toggleLeftSidebar a span").toggleClass("fa-chevron-right");
    $("#toggleLeftSidebar a span").toggleClass("fa-chevron-left");
});

// Toggle pages on mobile
$("#toggleRightSidebar").on("click", function() {
    // $("#leftSidebar").toggleClass("hide");
    // $("#leftSidebar").toggleClass("position-absolute");
    $("#rightSidebar").toggleClass("show");
    $("#toggleRightSidebar").toggleClass("push");
    $("#toggleRightSidebar a span").toggleClass("fa-chevron-left");
    $("#toggleRightSidebar a span").toggleClass("fa-chevron-right");
});