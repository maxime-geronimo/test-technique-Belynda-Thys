<?php
include ('config/config.php');


$imageToUpload = $_FILES['image'];

if(isset($imageToUpload) && (!empty($imageToUpload))) {

    $uploads_dir = 'assets/uploads/';
    $image_name = basename($imageToUpload['name']);

    $taille_maxi = 100000;
    $taille = filesize($imageToUpload['tmp_name']);

    $extensions = array('.png', '.jpg', '.jpeg', '.JPG');
    $extension = strrchr($imageToUpload['name'], '.');

    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg...';
    }

    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros... choisissez un fichier inférieur à 100ko';
    }

    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        $image_name = strtr($image_name,
           'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image_name = preg_replace('/([^.a-z0-9]+)/i', '-', $image_name);


        if(move_uploaded_file($imageToUpload['tmp_name'], $uploads_dir . $image_name))
        {
            $sql = 'INSERT INTO images(image_name) VALUES (:image_name)';

            $req = $bdd->prepare($sql);
            $req->execute(
                array(
                    'image_name' => $image_name
                )
            );


            if ($req){

                $sqlCreate = "SELECT image_id FROM images WHERE image_name = '". $image_name. "' ORDER BY image_id DESC LIMIT 1";

                $reqCreate = $bdd->prepare($sqlCreate);
                $reqCreate->execute();

                $imageCreated = $reqCreate->fetch();

                header("Location: index.php?id=" . $imageCreated['image_id']);

            } else {

                echo "pb";
            }

        } else {

            echo 'Echec de l\'upload !';
        }


    } else {

        echo $erreur;
    }

}
?>