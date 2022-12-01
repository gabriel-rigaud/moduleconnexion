<?php
session_start();
if($_SESSION["autoriser"]!="oui"){
    header("location:login.php");
    exit();
}
if(date("H")<18)
    $bienvenue="Bonjour et bienvenue ".
        $_SESSION["prenomNom"].
        " dans votre espace personnel";
else
    $bienvenue="Bonsoir et bienvenue ".
        $_SESSION["prenomNom"].
        " dans votre espace personnel";
?>