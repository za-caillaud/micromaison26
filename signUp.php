<?php

// initialisation de tableaux vides: 1 pour les erreurs, 1 pour la data
$errors = [];
$data = [];

// On se connecte à MySQL
require('dbconnect.php');
$bdd = dbconnect();


if (!empty($_POST)) {
    if (!empty($_POST["prenom"]) || strlen($_POST["prenom"]) > 1) {
        $data['prenom'] = htmlspecialchars($_POST["prenom"]);
    } else {
        $errors["prenom"] = 'erreur sur le champs prénom';
    }


    if (!empty($_POST["nom"]) || strlen($_POST["nom"]) > 2) {
        $data['nom'] = htmlspecialchars($_POST["nom"]);
    } else {
        $errors["nom"] = 'erreur sur le champs nom';
    }


    // filter_var vérifie que l'email respecte bien le format d'email : "string@string.string"
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $data['email'] = htmlspecialchars($_POST["email"]);
    } else {
        $errors["email"] = 'erreur sur le champs email';
    }

    if ($_POST['confirmMotDePasse'] === $_POST['motDePasse'] && strlen($_POST['motDePasse']) > 6) {
        // on stock dans $data le mot de passe hashé (password_hash)
        $data['motDePasse'] = password_hash($_POST["motDePasse"], PASSWORD_DEFAULT);
    } else {
        $errors["motDePasse"] = 'erreur sur le champs Mot de passe';
    }
}


if (!empty($errors)) {
    // je boucle sur mon tableau d'erreur et je les affiche tant qu'il y en a
    foreach ($errors as $error) {
        echo $error;
    }
    die;
}

$sql = "INSERT INTO utilisateur( prenom, nom, email, mdp) VALUES(:prenom, :nom, :email, :motDePasse)";

//je prépare ma requête sql
$req = $bdd->prepare($sql);
//j'exécute  ma requête
$req->execute($data);
