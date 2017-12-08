$(document).ready(function() {
    var url = 'index.php';
    //popup
    $(".popup__closeButton").click(function () {
        $(".popup").hide();
        $('.overlay').fadeOut(400);
        $(".uploadPopup").hide();
        setTimeout(function(){
            window.location.href = url;
        }, 0);
    });

    //upload file
    $(".manage__add").click(function () {
        //$(".uploadPopup").show();
        //$('.overlay').show();
        $('#inputFile').click();
    });

    $('#inputFile').change(function () {
        $('.uploadForm').submit();
    });

    //pictures hover
    $(".container").hover(function () {
        $(this).css('background-image', 'linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1)), url("assets/uploads/<?php echo($imagesStock[$i]["image_name"])?>"');
       console.log('hover');
    });

    //form
    $(".editForm__inputTitle").click(function () {
        $(this).val("");
    });

});
