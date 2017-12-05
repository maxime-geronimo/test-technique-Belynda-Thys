<?php
include ('config/config.php');

$image_id = $_POST['image_id'];
//echo ($image_id);
$image_id_to_remove = $_POST['image_id_to_remove'];
//echo ($image_id_to_remove);

if($image_id != $image_id_to_remove){

    $sqlUpdateDefault1 = "UPDATE images SET set_as_default = 1 WHERE image_id = '". $image_id. "'";

    $reqUpdateDefault1 = $bdd->prepare($sqlUpdateDefault1);
    $reqUpdateDefault1->execute();


    $sqlUpdateDefault2 = "UPDATE images SET set_as_default = 0 WHERE image_id = '". $image_id_to_remove. "'";

    $reqUpdateDefault2 = $bdd->prepare($sqlUpdateDefault2);
    $reqUpdateDefault2->execute();

    if ($reqUpdateDefault1 && $reqUpdateDefault2){
        header("Location: index.php");
    } else {
        echo ("pb");
    }

} else {
    header("Location: index.php");
}



