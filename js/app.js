$(document).ready(function() {
    $(".popup__closeButton").click(function () {
        $(".popup").hide();
        $('.overlay').fadeOut(400);
        $(".uploadPopup").hide();
    });

    /*$(".manage__editPicture").click(function () {
        $(".popup").show();
        $('.overlay').show();
    });*/

    $(".manage__add").click(function () {
        $(".uploadPopup").show();
        $('.overlay').show();
    });

    $(".container").hover(function () {
        $(this).css('background-image', 'linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1)), url("assets/uploads/<?php echo($imagesStock[$i]["image_name"])?>"');
       console.log('hover');
    });

    $(".editForm__inputTitle").click(function () {
        $(this).val("");
    });
/*
    $(".editForm__labelTitle").click(function () {
        $(this).css('visibility', 'hidden');

    })*/
});
