<?php
if(isset($_FILES['image']) && (!empty($_FILES['image']))) {

    $dossier = 'assets/uploads/';
    $image = basename($_FILES['image']['name']);

    $taille_maxi = 100000;
    $taille = filesize($_FILES['image']['tmp_name']);

    $extensions = array('.png', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['image']['name'], '.');


    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg, txt ou doc...';
    }

    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }

    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        $image = strtr($image,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);


        if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $image))
        {
            echo 'Upload effectué avec succès !';

            $sql = 'INSERT INTO images(image_name) VALUES (:image_name)';

            $req = $bdd->prepare($sql);
            $req->execute(
                array(
                    'image_name' => $image,
                )
            );

        } else {

            echo 'Echec de l\'upload !';
        }


    } else {

        echo "test";
    }

}
?>