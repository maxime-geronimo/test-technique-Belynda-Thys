<?php
include ('config/config.php');

$image_id = $_POST['image_id'];
$image_title = $_POST['image_title'];
$image_describe = $_POST['image_describe'];

//echo ($image_id);
//echo ($image_describe . $image_title);

$sqlUpdate = "UPDATE images SET image_title = '". $image_title. "',
                                image_describe = '". $image_describe. "' WHERE image_id = '". $image_id. "'";

$reqUpdate = $bdd->prepare($sqlUpdate);
$reqUpdate->execute(
    array(
        'image_title' => $image_title,
        'image_describe' => $image_describe
    )
);

if ($reqUpdate){
    header("Location: index.php");
} else {
    echo ("pb");
}