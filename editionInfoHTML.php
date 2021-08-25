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

<body style="background: url(./assets/img/plage1.jpg) center/cover;">


    <?php

    if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin']) {


            if (isset($_GET['id'])) {

                $getId = (int)htmlspecialchars($_GET['id']);

                $reponse = $bdd->query('SELECT id, ligne1, ligne2, ligne3, ligne4, ligne5, ligne6 FROM info WHERE info.id=' . $getId)->fetch(PDO::FETCH_ASSOC);

    ?>

                <div class="update" style="margin-top: 40px;">

                    <form action="editionInfo.php" method="POST" enctype="multipart/form-data">

                        <div>

                            <input type="hidden" name="id" id="input" value="<?php echo $reponse['id'] ?>">
                        </div>

                        <div>
                            <label for="name">ligne 1</label><br>
                            <input type="text" name="ligne1" id="input" value="<?php echo $reponse['ligne1'] ?>">
                        </div>

                        <div>
                            <label for="name">ligne 2</label><br>
                            <input type="text" name="ligne2" id="input" value="<?php echo $reponse['ligne2'] ?>">
                        </div>

                        <div>
                            <label for="name">ligne 3</label><br>
                            <input type="text" name="ligne3" id="input" value="<?php echo $reponse['ligne3'] ?>">
                        </div>

                        <div>
                            <label for="text">ligne 4</label><br>
                            <textarea name="ligne4" id="text" cols="30" rows="10"><?php echo $reponse['ligne4'] ?> </textarea><br>

                        </div>

                        <div>
                            <label for="text">ligne 5</label><br>
                            <textarea name="ligne5" id="text" cols="30" rows="10"><?php echo $reponse['ligne5'] ?> </textarea><br>

                        </div>

                        <div>
                            <label for="text">ligne 6</label><br>
                            <textarea name="ligne6" id="text" cols="30" rows="10"><?php echo $reponse['ligne6'] ?> </textarea><br>
                            <br>
                        </div>

                        <input type="submit" id="btn" value="  MODIFIER  " />

                    </form>
                </div>


    <?php
            } else {
                header('location: ./admin.php');
            }
        }
    }

    ?>
</body>