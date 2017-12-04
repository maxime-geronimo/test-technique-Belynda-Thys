$(document).ready(function() {
    $(".popup__closeButton").click(function () {
        $(".popup").hide();
        $('.overlay').fadeOut(400);
        $(".uploadPopup").hide();
    });

    $(".manage__editPicture").click(function () {
        $(".popup").show();
        $('.overlay').show();
    });

    $(".manage__add").click(function () {
        $(".uploadPopup").show();
        $('.overlay').show();
    });
});
