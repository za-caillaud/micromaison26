<?php

session_start();

require('dbconnect.php');
$bdd = dbconnect();
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


    <title>Location Lacanau</title>
</head>

<?php

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {


        if (isset($_GET['id'])) {

            $getId = (int)htmlspecialchars($_GET['id']);

            $reponse = $bdd->query('SELECT id, name, text, picture  FROM espaces WHERE espaces.id=' . $getId)->fetch(PDO::FETCH_ASSOC);

?>

            <div class="update" style="margin: 100px auto;">

                <form action="editionEspace.php" method="POST" enctype="multipart/form-data">
                    <div>

                        <input type="hidden" name="id" id="input" value="<?php echo $reponse['id'] ?>">
                    </div>
                    <div>
                        <label for="name">titre</label><br>
                        <input type="text" name="name" id="input" value="<?php echo $reponse['name'] ?>">
                    </div>


                    <div>
                        <label for="text">descriptif</label><br>
                        <textarea name="text" id="text" cols="30" rows="10"><?php echo $reponse['text'] ?> </textarea><br>
                        <br>
                    </div>
                    <div>
                        <img class="img-card" src="./assets/img/<?php echo $reponse['picture']; ?>" alt="photo" style="height: 180px;
  width: 180px;">
                    </div>

                    <div>
                        <input type="file" name="picture" value="upload file" />

                    </div>


                    <input type="submit" id="btn" value="  MODIFIER  " />

                    <?php

                    ?>

                    <!-- ****************************************DELETE******************************************* -->

                    <div id="delete">

                        <p>SUPPRIMER définitivement?</p>
                        <div class="button-container">
                            <a class="oui" href="./deleteEspace.php?id=<?= $reponse['id']; ?>">Oui</a>
                        </div>
                    </div>
                </form>
            </div>

<?php
        } else {
            header('location: ./admin.php');
        }
    }
}


?>