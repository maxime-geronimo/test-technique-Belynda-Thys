<?php


// GET IMAGES STOCK
$sqlStock = 'SELECT * FROM images';

$reqStock = $bdd->prepare($sqlStock);
$reqStock->execute();

$imagesStock = $reqStock->fetchAll();
//var_dump($imagesStock);

$nb_images = count($imagesStock);


// GET DEFAULT IMAGE
$sqlDefault = 'SELECT * FROM images WHERE set_as_default = 1';

$reqDefault = $bdd->prepare($sqlDefault);
$reqDefault->execute();

$imageToSet = $reqDefault->fetch();
//var_dump($imageToSet);


// GET IMAGE TO EDIT
$sqlEdit = 'SELECT * FROM images WHERE image_id = :image_id';

$reqEdit = $bdd->prepare($sqlEdit);
$reqEdit->execute(
    array(
        'image_id' => $id
    )
);

$imageToEdit = $reqEdit->fetch();
//var_dump($imageToEdit);
