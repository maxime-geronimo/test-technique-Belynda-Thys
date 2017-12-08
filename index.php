<?php

include ('config/config.php');
include ('upload.php');
include ('editPicture.php');

$sqlStock = 'SELECT * FROM images';

$reqStock = $bdd->prepare($sqlStock);
$reqStock->execute();

$imagesStock = $reqStock->fetchAll();
//var_dump($imagesStock);

$nb_images = count($imagesStock);

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

<?php

$sqlDefault = 'SELECT * FROM images WHERE set_as_default = 1';

$reqDefault = $bdd->prepare($sqlDefault);
$reqDefault->execute();

$imageToSet = $reqDefault->fetch();
//var_dump($imageToSet);

?>

<section class="header">
    <h1 class="header__title">Profile Pic Manager</h1>
    <img class="header__profilePicture" src="assets/uploads/<?php if (!empty($imageToSet['image_name'])) {echo($imageToSet['image_name']);} elseif (!empty($imagesStock[0]['image_name'])) { echo ($imagesStock[0]['image_name']);} else { echo ('placeholder.png');}?>">
</section>

<section class="manage">
    <div class="manage__edit">

        <?php
        $i = 0;
        $nb = $nb_images - 1;
        for ($i = 0; $i <= $nb;) {
            ?>
            <a class="manage__editLink" href="index.php?id=<?php echo($imagesStock[$i]['image_id'])?>">
                <div class="container" style="background-image: url('assets/uploads/<?php echo($imagesStock[$i]['image_name'])?>');">
                    <!--<img class="manage__editPicture" src="assets/uploads/<?php echo($imagesStock[$i]['image_name'])?>">-->
                    <div class="container-hover"></div>
                    <form class="defaultForm" method="POST" action="default.php">
                        <input type="hidden" name="image_id" value="<?php echo($imagesStock[$i]['image_id']);?>">
                        <input type="hidden" name="image_id_to_remove" value="<?php echo($imageToSet['image_id']);?>">
                        <button class="manage__editDefault" type="submit">
                            set as defaut
                        </button>
                    </form>
                </div>
            </a>

            <?php
            $i=$i+1;
        }
        ?>

        <div class="container-placeholder">
            <!--<img class="manage__editPicture" src="assets/img/placeholder.png">-->
            <img class="manage__editPic" src="assets/img/placeholder-picture.png">
        </div>
    </div>
    <img class="manage__add" src="assets/img/add.png" srcset="assets/img/add@2x.png, assets/img/add@3x.png">
</section>

<div class="overlay"></div>
<div class="overlayBack"></div>

<?php

$sqlEdit = 'SELECT * FROM images WHERE image_id = :image_id';

$reqEdit = $bdd->prepare($sqlEdit);
$reqEdit->execute(
    array(
        'image_id' => $id
    )
);

$imageToEdit = $reqEdit->fetch();
//var_dump($imageToEdit);

?>

<div class="popup">
    <img class="popup__closeButton" src="assets/img/close.png" srcset="assets/img/close@2x.png, assets/img/close@3x.png">
    <div class="popup__rectangle">
        <img class="popup__rectanglePicture" src="assets/uploads/<?php echo($imageToEdit['image_name'])?>">
        <form id="editForm" class="editForm" method="POST" action="update.php">
            <input type="hidden" name="image_id" value="<?php echo($id);?>">
            <?php if(empty($imageToEdit['image_title'])) {?>
                <!--<label class="editForm__labelTitle">Titre</label><br>-->
                <input class="editForm__inputTitle" type="text" name="image_title" value="Titre"><br>
            <?php
            } else {
                ?>
                <input class="editForm__inputTitle" type="text" name="image_title" value="<?php echo($imageToEdit['image_title']);?>"><br>
            <?php
            }?>

            <label class="editForm__labelDescribe">Description</label><br>
            <textarea class="editForm__inputDescribe" name="image_describe" form="editForm"><?php if(!empty($imageToEdit)){echo($imageToEdit['image_describe']);}?></textarea>
    </div>
    <div class="popup__actions">
        <button class="popup__actionEdit">
            <img class="popup__actionsPic" src="assets/img/edit-1482.png" srcset="assets/img/edit-1482@2x.png, assets/img/edit-1482@3x.png">
            <span class="popup__buttonSpan">Éditer</span>
        </button>
        </form>

        <form class="deleteForm" method="POST" action="delete.php">
            <input type="hidden" name="image_id" value="<?php echo($id);?>">
            <button class="popup__actionDelete" type="submit">
                <img class="popup__actionsPic" src="assets/img/delete-1487.png" srcset="assets/img/delete-1487@2x.png, assets/img/delete-1487@3x.png">
                <span class="popup__buttonSpan">Supprimer</span>
            </button>
        </form>
    </div>
</div>

<!--<div class="uploadPopup">
    <img class="popup__closeButton" src="assets/img/close.png" srcset="assets/img/close@2x.png, assets/img/close@3x.png">
    <div class="popup__rectangle">-->
        <form class="uploadForm" method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <input id="inputFile" type="file" name="image">
            <input type="submit" name="envoyer" value="Envoyer l'image">
        </form>
    <!--</div>
</div>-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/app.js"></script>
<?php
include('editPicture.php');
?>

</body>
</html>