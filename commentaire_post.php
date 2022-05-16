<?php
session_start();

if (isset($_POST['valider'])){
    include('connexion.php');
    $response=$db->prepare('insert into commentaire (idbillet, auteur, commentaire) values
    (?, ?, ?)');
    $response->execute(array($_SESSION['idbillet'], $_POST['auteur'], $_POST['comment']));
    $response->closeCursor();
    header('location:commentaire.php');
}
?>