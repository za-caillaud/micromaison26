<?php

require('dbconnect.php');
$bdd = dbconnect();

$errors = [];
$datas = [];



if (!empty($_POST)) {


    if (!empty($_POST['name'])) {
        $datas['name'] = htmlspecialchars($_POST['name']);
    } else {
        $errors['name'] = "erreur sur titre";
    }


    if (!empty($_POST['text'])) {
        $datas['text'] = htmlspecialchars($_POST['text']);
    } else {
        $errors['text'] = "erreur sur descriptif";
    }

    if (!empty($_FILES)) {
        $dossier = './assets/img';
        $fichier = $_FILES['picture']['name'];
        $taille_maxi = 1000000;
        $taille = filesize($_FILES['picture']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.PNG');
        $extension = strrchr($_FILES['picture']['name'], '.');


        if (!in_array($extension, $extensions)) {
            $errors['picture'] = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg....';
        }

        if ($taille > $taille_maxi) {
            $errors['picture-size'] = 'Le fichier est trop gros...';
        }

        if (!isset($errors['picture']) && !isset($errors['picture-size'])) {

            $fichier = strtr(
                $fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
            );



            if (!is_dir($dossier)) {
                mkdir($dossier, 0755);
            }

            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            if (move_uploaded_file($_FILES['picture']['tmp_name'], "$dossier/$fichier")) {
                $datas['picture'] = "$fichier";
                echo 'Upload effectué avec succès !';


                header('location: admin.php');
            } else {
                echo 'Echec de l\'upload !';
            }
        }
    } else {
        $datas['picture'] = null;
    }

    // *****************************************************


}

if (!empty($errors)) {

    foreach ($errors as $error) {
        echo $error;
    }
    die;
}

$sql = "INSERT INTO espaces(name, text, picture) VALUES(:name, :text, :picture)";

$req = $bdd->prepare($sql);

$req->execute($datas);
