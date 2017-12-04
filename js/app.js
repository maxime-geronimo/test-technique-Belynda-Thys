$(document).ready(function() {
    $(".popup__closeButton").click(function () {
        $(".popup").hide();
        $('.overlay').fadeOut(400);
    });

    $(".manage__add").click(function () {
        $(".popup").show();
        $('.overlay').show();
    });
});
