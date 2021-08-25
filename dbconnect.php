<?php

function dbconnect()
{
    try {

        $bdd = new PDO("mysql:host=sql11.freemysqlhosting.net; dbname=sql11432832; charset=utf8", "sql11432832", "piwBFKCxBb");

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
