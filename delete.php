<?php
include ('config/config.php');

$image_id = $_POST['image_id'];
//echo ($image_id);

$sqlDelete = "DELETE FROM images WHERE image_id = '". $image_id. "'";

$reqDelete = $bdd->prepare($sqlDelete);
$reqDelete->execute();

if ($reqDelete){
    header("Location: index.php");
} else {
    echo ("pb");
}