<?php

session_start();

require('dbconnect.php');
$bdd = dbconnect();


$reponse = $bdd->query('SELECT id, name, text, picture  FROM espaces')->fetchAll(PDO::FETCH_ASSOC);
$reponse2 = $bdd->query('SELECT id, ligne1, ligne2, ligne3, ligne4, ligne5, ligne6 FROM info')->fetchAll(PDO::FETCH_ASSOC);


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


    <title>Micromaison N°26</title>
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
                        <a class="nav-link" href="#email-telephone">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <header>

            <div class="header-titre reveal">
                <div class="reveal-2">
                    <h4 style="font-family: 'Cabin Sketch', cursive;">IL EST TEMPS <br> DE S'EVADER !</h4>
                </div>
                <div class="trait reveal-2"></div>
                <div class="reveal-3">
                    <h4 style="font-family: 'Cabin Sketch', cursive;">sur la côte Atlantique</h4>
                </div>
            </div>

        </header>

        <main>

            <h1>Micromaison N°26</h1>
            <h3>Location de vacances à LACANAU</h3>
            <p>Email: <span id="email" style="font-family: 'Open Sans', sans-serif;"> locationlacanau33680@gmail.com </span><br> N° téléphone:<span id="telephone" style="font-family: 'Open Sans', sans-serif;">
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

            <div id="descriptif">
                <?php
                foreach ($reponse as $espace) {
                ?>
                    <div class="card" style="width: auto;">
                        <img src="./assets/img/<?php echo $espace['picture']; ?>" class="card-img-top" alt="photo">
                        <div class="card-body">
                            <h3><?php echo $espace['name']; ?></h3>
                            <p class="card-text" style="font-family: 'Open Sans', sans-serif;"><?php echo $espace['text']; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!--***********************************************INFO****************************************************** -->
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

                <?php } ?>
            </div>

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
                    <p id="text-cursive" style="font-family: 'Dancing Script', cursive;">Au plaisir de vous accueillir à toutes saisons le temps d'une location. <br>
                        Laurent

                    </p>
                </div>

            </div>
            <!--***********************************formulaire***************************-->

            <form action="traitement-contacts.php" method="post">
                <div>
                    <label for="name">NOM :</label>
                    <input type="text" id="name" name="nom">
                </div>
                <div>
                    <label for="mail">E-MAIL :</label>
                    <input type="email" id="mail" name="email">
                </div>

                <div>
                    <label for="msg">MESSAGE :</label>
                    <textarea id="msg" name="message"></textarea>
                </div>
                <div class="button">
                    <button type="submit">ENVOYER</button>
                </div>
            </form>


            <!-- **********************************carte google********************************************** -->
            <div class="googleMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8334.236211304938!2d-1.0850934472768154!3d44.990983575019975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd54ad2d67956c2f%3A0xc9fca11bcbdb3a3a!2sAv.%20de%20l&#39;Oc%C3%A9an%2C%2033680%20Lacanau!5e0!3m2!1sfr!2sfr!4v1629198319039!5m2!1sfr!2sfr" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </main>


        <!-- **********************************footer*************************************** -->
        <footer>

            <div class="footer">

                <div class="arrow">
                    <a href="#"><img src="./assets/img/arrow up.png" alt="Haut de page"></a>
                </div>

                <div id="copy">
                    <h5>Copyright © 2021 Tous droits réservés - Développé par Z.Caillaud</h5>
                </div>

                <div id="social_icons">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-github"></i></a>
                </div>
            </div>
        </footer>



        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src='./assets/js/bootstrap.min.js'></script>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="./Assets/js/jquery.js"></script>
        <script type="text/javascript" src="./Assets/js/script.js"></script>


    </div>
</body>


</html>