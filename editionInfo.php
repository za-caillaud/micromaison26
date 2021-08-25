<?php

session_start();

require('dbconnect.php');
$bdd = dbconnect();


$errors = [];
$datas = [];


if (!empty($_POST)) {


    if (!empty($_POST['ligne1'])) {
        $datas['ligne1'] = htmlspecialchars($_POST['ligne1']);
    } else {
        $errors['ligne1'] = "erreur sur ligne 1";
    }


    if (!empty($_POST['ligne2'])) {
        $datas['ligne2'] = htmlspecialchars($_POST['ligne2']);
    } else {
        $errors['ligne2'] = "erreur sur ligne 2";
    }

    if (!empty($_POST['ligne3'])) {
        $datas['ligne3'] = htmlspecialchars($_POST['ligne3']);
    } else {
        $errors['ligne3'] = "erreur sur ligne 3";
    }

    if (!empty($_POST['ligne4'])) {
        $datas['ligne4'] = htmlspecialchars($_POST['ligne4']);
    } else {
        $errors['ligne4'] = "erreur sur ligne 4";
    }

    if (!empty($_POST['ligne5'])) {
        $datas['ligne5'] = htmlspecialchars($_POST['ligne5']);
    } else {
        $errors['ligne5'] = "erreur sur ligne 5";
    }

    if (!empty($_POST['ligne6'])) {
        $datas['ligne6'] = htmlspecialchars($_POST['ligne6']);
    } else {
        $errors['ligne6'] = "erreur sur ligne 6";
    }

    // ****************************************************
    if (isset($errors)) {
        foreach ($errors as $error) {
            echo $error;
        }
    }



    if (!empty($datas['id'])) {
        $sql = "UPDATE info SET ligne1 = :ligne1, ligne2= :ligne2, ligne3= :ligne3, ligne4 = :ligne4, ligne5 = :ligne5, ligne6 = :ligne6 WHERE id=" . $_POST['id'];
    } else {
        $sql = "UPDATE info SET ligne1 = :ligne1, ligne2= :ligne2, ligne3= :ligne3, ligne4 = :ligne4, ligne5 = :ligne5, ligne6 = :ligne6 WHERE id=" . $_POST['id'];
    }


    $stmt = $bdd->prepare($sql);
    $stmt->execute($datas);



    header('location: admin.php');
} else {
    echo 'aucune données reçu';
}
