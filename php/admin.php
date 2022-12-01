<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header('location: connexion.php');
    exit();
}

else $connexion = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
    $requete = 'SELECT * FROM utilisateurs';
    $query = mysqli_query($connexion, $requete);

    $champs = mysqli_fetch_fields($query);

    $resultat = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /></html>
<link rel="icon" type="image/png" href="/img/logo.jpg">
</head>

<header>
    <div class="topnav" id="myTopnav">
        <div class="logo"> <img src="/img/logo.jpg" width="90"></div>
        <a href="/html/index.html">Accueil</a>
        <a href="connexion.php">Connexion</a>
        <a href="inscription.php">Inscription</a>
        <a href="profil.php">Profil</a>
        <a href="#" class="active">Admin</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>

<body>
<section id="contact">
    <div class="container">
        <div class="titre">
            <h1>Page Admin</h1>
        </div>
    <body>

    <section>
        <div>
            <h1 class="head_admin">Toutes les infos de la base de donnée</h1>
            <?php
            echo "<table style=width='300px;' class='tableau'>";
            echo '<tr>';
            foreach ($champs as $champ )
            {
                echo "<td> $champ->name </td>" ;
            }
            echo '</tr>';

            while(($resultat = mysqli_fetch_assoc($query))!=null)
            {
                echo '<tr>';
                foreach ($resultat as $value)
                {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            ?>
    </section>
    </div>
    <a style="color:white; text-decoration:none;" href="deconnexion.php">Deconnexion</a>
</body>
<footer>
    <p class="copyright">Gabriel Compagnie / 2020 Copyright &copy;</p>
    <div class="liens">
        <a href="https://github.com/gabriel-rigaud" target="_blank"><img src="/img/github.gif" width="70" alt="Github"></a>
        <a href="https://gabriel-rigaud.students-laplateforme.io/" target="_blank"><img src="/img/document.gif" width="70" alt="Cv"></a>
    </div>
</footer>
</html>

<style>
    .tableau tr td{
        padding: 10px;
    }
</style>