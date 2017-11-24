<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 18/11/17
 * Time: 17:40
 */

function getResult($select){
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=base_etudiants", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch (PDOException $e) {
        echo "Connexion à la base impossible ! " . $e->getMessage();
    }

    // Selection en base de données
    $sql = $conn->query($select);
    $reponse = $sql->fetchAll();

    return $reponse;
}
