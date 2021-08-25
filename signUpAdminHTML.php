<?php

session_start();

?>

<div class="signUp">
    <form action="signUp.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nom">Nom </label>
            <input type="text" id="nom" name="nom">
        </div>
        <div>
            <label for="prenom">Prenom </label>
            <input type="text" id="prenom" name="prenom">
        </div>

        <div>
            <label for="email">E-MAIL </label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="motDePasse">PASSWORD </label>
            <input type="password" id="motDePasse" name="motDePasse">
        </div>
        <div>
            <label for="confirmMotDePasse">CONFIRM PASSWORD </label>
            <input type="password" id="confirmMotDePasse" name="confirmMotDePasse">
        </div>
        <br>
        <div class="button">
            <button type="submit" name="btn-signUp">S'inscrire</button>
        </div>



    </form>
</div>