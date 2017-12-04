<?php

include ('config/config.php');
include ('upload.php');

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pic Manager</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<section class="header">
    <h1 class="header__title">Profile Pic Manager</h1>
    <img class="header__profilePicture" src="assets/img/faune2.jpg">
</section>

<section class="manage">
    <div class="manage__edit">

        <?php
        $i = 0;
        $nb = $nb_imagesStock - 1;
        for ($i = 0; $i <= $nb;) {
            ?>
            <div class="container">
                <img class="manage__editPicture" src="assets/uploads/<?php echo($imagesStock[$i])?>">
                <div class="manage__editLink">
                    Set as defaut
                </div>
            </div>
            <?php
            $i=$i+1;
        }
        ?>

        <!--<div class="container">
            <img class="manage__editPicture" src="assets/img/<?php echo($img_stock[0])?>">
            <div class="manage__editLink">
                Set as defaut
            </div>
        </div>
        <div class="container">
            <img class="manage__editPicture" src="assets/img/<?php echo($img_stock[1])?>">
            <div class="manage__editLink">
                Set as defaut
            </div>
        </div>
        <div class="container">
            <img class="manage__editPicture" src="assets/img/faune4.jpg">
            <div class="manage__editLink">
                Set as defaut
            </div>
        </div>
        <div class="container">
            <img class="manage__editPicture" src="assets/img/faune5.jpg">
            <div class="manage__editLink">
                Set as defaut
            </div>
        </div>
        <div class="container">
            <img class="manage__editPicture" src="assets/img/faune6.jpg">
            <div class="manage__editLink">
                Set as defaut
            </div>
        </div>
        <div class="container">
            <img class="manage__editPicture" src="assets/img/picture-2.png">
            <div class="manage__editLink">
                Set as defaut
            </div>
        </div>-->
        <div class="container">
            <img class="manage__editPicture" src="assets/img/placeholder.png">
        </div>
    </div>
    <img class="manage__add" src="assets/img/add.png" srcset="assets/img/add@2x.png, assets/img/add@3x.png">
</section>

<div class="overlay"></div>
<div class="overlayBack"></div>

<div class="popup">
    <img class="popup__closeButton" src="assets/img/close.png" srcset="assets/img/close@2x.png, assets/img/close@3x.png">
    <div class="popup__rectangle">
        <img class="popup__rectanglePicture" src="assets/img/picture-7.png" srcset="assets/img/picture-7@2x.png 2x, assets/img/picture-7@3x.png 3x">
        <form class="editForm">
            <label class="editForm__labelTitle">Titre</label><br>
            <input class="editForm__inputTitle" type="text"><br>
            <label class="editForm__labelDescribe">Description</label><br>
            <input class="editForm__inputDescribe" type="text">
        </form>
    </div>
    <div class="popup__actions">
        <button class="popup__actionEdit">
            <img src="">
            <span class="popup__buttonSpan">Éditer</span>
        </button>
        <button class="popup__actionDelete">
            <img src="">
            <span class="popup__buttonSpan">Supprimer</span>
        </button>
    </div>
</div>

<div class="uploadPopup">
    <img class="popup__closeButton" src="assets/img/close.png" srcset="assets/img/close@2x.png, assets/img/close@3x.png">
    <div class="popup__rectangle">
        <form class="uploadForm" method="POST" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <input type="file" name="image">
            <input type="submit" name="envoyer" value="Envoyer l'image">
        </form>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>