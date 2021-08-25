<?php
session_start();

require('dbconnect.php');
$bdd = dbconnect();

if (isset($_SESSION['admin'])) {


    $req = $bdd->prepare('DELETE FROM espaces WHERE id=' . $_GET['id']);
    $req->execute(array(
        'id' => $_GET['id']
    ));


    header('Location: ./admin.php');
} else {
    echo 'Vous ne pouvez pas acceder à cette page  ';
}
