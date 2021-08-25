<?php

session_start();

?>

<body style="background: url(./assets/img/plage1.jpg) center/cover;">
    <div class="signIn" style="text-align: center;
  margin-top: 80px;">
        <form action="signIn.php" method="post">

            <div>
                <label for="email">E-MAIL </label>
                <input type="email" id="email" name="email">
            </div>
            <br>
            <div>
                <label for="motDePasse">PASSWORD</label>
                <input type="password" id="motDePasse" name="motDePasse">
            </div>

            <br>
            <div class="button">
                <button type="submit" name="btn-signUp">Se connecter</button>
            </div>

        </form>
    </div>
</body>