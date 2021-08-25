<?php

$errors = [];
$data = [];
$user = [];

require('dbconnect.php');
$bdd = dbconnect();


$reponse = $bdd->query('SELECT email, mdp FROM utilisateur');


if (isset($_POST['email'])) {

    if (!empty($_POST)) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = strip_tags($_POST['email']);

            // Si email vide
        } else {
            $errors['email'] = "pas d'email";
        }
    }


    if (!empty($_POST['email']) && !empty($_POST['motDePasse'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {



        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email=:email');
        $req->execute($data);
        $user = $req->fetch(PDO::FETCH_ASSOC);


        if (!empty($user)) {
            if (password_verify($_POST['motDePasse'], $user['mdp'])) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['admin'] = $user['admin'];

                echo 'vous êtes connecté';

                // pour être rediriger sur la page d'accueil pour admin
                header('location: admin.php');
            } else {
                echo "invalide mot de passe ou email";
            }
        }

        // Si password vide
    } else {
        $errors['user'] = 'Mauvais identifiant ou mot de passe';
    }
}




if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
    die;
}
