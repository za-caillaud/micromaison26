<?php

session_start();

require('dbconnect.php');
$bdd = dbconnect();


$reponse = $bdd->query('SELECT id, name, text, picture  FROM espaces')->fetchAll(PDO::FETCH_ASSOC);
$reponse2 = $bdd->query('SELECT id, ligne1, ligne2, ligne3, ligne4, ligne5, ligne6 FROM info')->fetchAll(PDO::FETCH_ASSOC);


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" />


    <title>page d'administrateur</title>
</head>

<body>

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
                        <?= (isset($_SESSION['admin'])) && $_SESSION['admin'] == true ?  '<a class="nav-link" href="./consulterContactsHTML.php">Messages</a>' : '' ?>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?= $linkAdmin; ?>"><?= $connexion; ?></a>
                    </li>
                </ul>
            </div>
        </nav>

        <h1>Micromaison N°26</h1>
        <h3>Location de vacances à LACANAU</h3>
        <p>Email: <span id="email"> locationlacanau33680@gmail.com </span><br> N° téléphone:<span id="telephone">
                06.63.45.78.48</span></p>

        <!-- ***************************carousel photos************************************************ -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/salon-carousel-min.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/cuisine-carousel-min.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/chambre-min.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/lac-lacanau-min.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/plage-gurp-min.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/dune.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/plage2.jpg" class="d-block w-100" alt="photo">
                </div>

                <div class="carousel-item">
                    <img src="./assets/img/bassin.jpg" class="d-block w-100" alt="photo">
                </div>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- *******************************************CARDS****************************************** -->
        <div id="card-descriptif">
            <p>Capacité : 1 à 3 personnes<br>
                Parking gratuit et sécurisé <br> Jardinet privé<br>
                <span id="covid">Nettoyage spécial covid-19</span>
            </p>
        </div>

        <?= (isset($_SESSION['admin'])) && $_SESSION['admin'] == true ?  '<a href="./createEspaceHTML.php?id=' .  '"  id="addEspace"><button type="submit" style="margin-left: 60px;">Créer un nouveau espace</button></a>' : '' ?>

        <div id="descriptif">
            <?php
            foreach ($reponse as $espace) {
            ?>
                <div class="card" style="width: auto;">
                    <img src="./assets/img/<?php echo $espace['picture']; ?>" class="card-img-top" alt="photo">
                    <div class="card-body">
                        <h3><?php echo $espace['name']; ?></h3>
                        <p class="card-text"><?php echo $espace['text']; ?>
                        </p>
                        <?= (isset($_SESSION['admin'])) && $_SESSION['admin'] == true ?  '<a href="./editionEspaceHTML.php?id=' . $espace['id'] . '"><button type="submit">MODIFIER</button></a>' : '' ?>
                    </div>
                </div>
            <?php } ?>

        </div>



        <!-- ***********************   INFO  ********************************  -->

        <div class="info">
            <?php
            foreach ($reponse2 as $info) {
            ?>
                <p><?php echo $info['ligne1']; ?><br>
                    <?php echo $info['ligne2']; ?><br>
                    <?php echo $info['ligne3']; ?><br>
                    <?php echo $info['ligne4']; ?><br>

                    <?php echo $info['ligne5']; ?><br><br>

                    <?php echo $info['ligne6']; ?></p>
                <?= (isset($_SESSION['admin'])) && $_SESSION['admin'] == true ?  '<a href="./editionInfoHTML.php?id=' . $info['id'] . '"><button type="submit">MODIFIER</button></a>' : '' ?>
        </div>
    <?php } ?>




    <!-- ************************************contact************************************************* -->

    <div class="contact">

        <div id="date-tarif">
            <h3>Dates et tarifs</h3>
            <ul>
                <p> Contrat de location saisonnière<br>du samedi au samedi</p>
                <p> L'été 2021</p>
                <li>03/07-10/07: 530€</li>
                <li>10/07-17/07: 560€</li>
                <li>17/07-24/07: 600€</li>
                <li>24/07-31/07: 620€</li>
                <li>31/07-07/08: 620€</li>
                <li>07/08-14/08: 620€</li>
                <li>14/05-21/08: 600€</li>
                <li>21/08-28/08: 560€</li>
                <li>28/08-04/09: 530€</li>
            </ul>
        </div>

        <div id="email-telephone">
            <h3>Contacter le propriétaire : </h3>
            <p>Merci de privilégier les contacts par mail ou sms pour toute demande non urgente. </p>

            <a href="mailto:locationlacanau33680@gmail.com" id="mail">locationlacanau33680@gmail.com</a>
            <p>N° téléphone : <a href="tel:0663457848">06.63.45.78.48</a> </p>
            <p id="text-cursive">Au plaisir de vous accueillir à toutes saisons le temps d'une location. <br>
                Laurent

            </p>
        </div>

    </div>


    <?php
    require __DIR__ . '/contents/footer.php'; ?>