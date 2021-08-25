<?php

session_start();


if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {
    } else {
        header('location: ./index.php');
    }


    require('dbconnect.php');
    $bdd = dbconnect();

    $linkAdmin = "";


    if (isset($_GET['connection'])) {
        if ($_GET['connection'] == "deconnection") {
            session_destroy();
            header('Location: admin.php');
        }
    }

    if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin'] ==  1) {
            $connexion = 'Se déconnecter';
            $linkAdmin = "admin.php?connection=deconnection";
        }
    } else {
        $connexion = 'Se connecter';
        $linkAdmin = "signInAdminHTML.php";
    }


?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">


        <title>tableau des contacts</title>
    </head>

    <body style="background: url(./assets/img/plage1.jpg) center/cover;">

        <div class="all">
            <nav class="navbar navbar-expand-lg navbar-dark ">

                <a class="navbar-brand" href="index.php"><img src="./assets/img/mimosa.png" alt="image mimosa"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#card-descriptif">Descriptif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#date-tarif">Dates et Tarifs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= $linkAdmin; ?>"><?= $connexion; ?></a>
                        </li>
                    </ul>
                </div>
            </nav>


            <table>
                <tr>
                    <td>id</td>
                    <td>Nom</td>
                    <td>email</td>
                    <td>message</td>
                </tr>

                <?php

                $reponse = $bdd->query('SELECT id, nom, email, message  FROM contacts');

                while ($donnees = $reponse->fetch()) {
                ?>


                    <tr>
                        <td><?php echo $donnees['id']; ?></td>

                        <td><?php echo $donnees['nom']; ?></td>
                        <td><?php echo $donnees['email']; ?></td>

                        <td><?php echo $donnees['message']; ?></td>

                    </tr>
                <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>
            </table>
    </body>
<?php
} else {
    echo 'Vous ne pouvez pas acceder à cette page sans être connecter en tant qu\'administrateur';

    header('Location: ./signInAdminHTML.php');
}
?>