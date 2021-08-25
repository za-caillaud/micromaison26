<?php

session_start();


if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {
    } else {
        header('location: ./index.php');
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


        <title>Location Lacanau</title>
    </head>

    <body style="background: url(./assets/img/bassin.jpg) center/cover;">


        <div class="create">
            <form action="createEspace.php" method="post" enctype="multipart/form-data">
                <div>
                    <h3>Ajoutez le nouveau espace</h3>
                </div>

                <div>
                    <label for="name">titre</label>
                    <input type="text" name="name" id="input">
                </div>


                <div>
                    <label for="text">descriptif</label><br />
                    <textarea name="text" id="text" cols="30" rows="10"> </textarea><br>

                </div>
                <div>
                    <input type="file" name="picture" value="upload file" />

                </div>

                <div>
                    <input type="submit" id="btn" value=" Créer" />
                </div>

            </form>
        </div>
    </body>
<?php
}
?>