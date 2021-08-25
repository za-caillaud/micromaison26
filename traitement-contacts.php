<?php

$errors = [];
$data = [];

require('dbconnect.php');
$bdd = dbconnect();


if (!empty($_POST)) {

    if (!empty($_POST["nom"]) || strlen($_POST["nom"]) > 2) {
        $data['nom'] = htmlspecialchars($_POST["nom"]);
    } else {
        $errors["nom"] = 'erreur sur le champs nom;  ';
    }


    // filter_var vérifie que l'email respecte bien le format d'email : "string@string.string"
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $data['email'] = htmlspecialchars($_POST["email"]);
    } else {
        $errors["email"] = 'erreur sur le champs email;  ';
    }

    if (!empty($_POST['message'])) {
        $data['message'] = htmlspecialchars($_POST['message']);
    } else {
        $errors['message'] = "erreur sur message";
    }
}


if (!empty($errors)) {

    foreach ($errors as $error) {
        echo $error;
    }
    die;
}

$sql = "INSERT INTO contacts( nom, email, message) VALUES(:nom, :email, :message)";

//je prépare ma requête sql
$req = $bdd->prepare($sql);
//j'exécute  ma requête
$req->execute($data);


header('location: index.php');
