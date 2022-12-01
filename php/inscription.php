<?php

if(isset($_POST['submit']))
{   
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($login && $prenom && $nom && $password)
    {

        if($password==$password2)
        {
            //hachage du password
            $password3 = password_hash($password, PASSWORD_BCRYPT, array('cost' =>10 ));

            $connexion = mysqli_connect("localhost","root","","moduleconnexion") or die('erreur');
            $reget = ("SELECT * FROM utilisateurs WHERE login='$login' ");
            $regetx = mysqli_query($connexion, $reget);
            $row = mysqli_num_rows($regetx);

            if($row==0)
            {
            $requete = ("INSERT INTO utilisateurs (`login`, `prenom`, `nom`, `password`) VALUE ('$login','$prenom','$nom','$password3')");
            $query = mysqli_query($connexion, $requete);
            header('location: connexion.php');
            }
            else echo "<p style='color: white'>" . "Ce pseudo existe deja !". "</p>";
        }
        else echo "<p style='color: white'>" . "les deux mots de passe doivent être identiques !". "</p>";
    }
    else $erreur= 'Renseignez tous les champs !';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insciption</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /></html>
    <link rel="icon" type="image/png" href="/img/logo.jpg">
</head>
<header>
    <div class="topnav" id="myTopnav">
        <div class="logo"> <img src="/img/logo.jpg" width="90"></div>
        <a href="/html/index.html">Accueil</a>
        <a href="connexion.php">Connexion</a>
        <a href="#" class="active">Inscription</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>
<body>
<section id="contact">
    <div class="container">
        <div class="titre">
            <h1>Inscription</h1>
            <p>Crée vous un nouveau compte c'est gratuit !</p>
        </div>
        <form action="inscription.php" method="post">
                    <div>
                        <label for="name">Votre Nom :</label>
                        <input type="text" id="name" name="nom" placeholder="Entrer votre nom">
                    </div>

                    <div>
                        <label for="first">Votre Prénom :</label>
                        <input type="text" id="first" name="prenom" placeholder="Entrer votre prénom">
                    </div>

                    <div>
                        <label for="log">Votre Login&nbsp;:</label>
                        <input type="text" id="log" name="login" placeholder="Entrer un login">
                    </div>

                    <div>
                        <label for="mdp">Password&nbsp;: </label>
                        <input type="password" id="mdp" name="password" placeholder="Entrer un password">
                    </div>

                    <div>
                        <label for="confmdp">Confirmé&nbsp;:</label>
                        <input type="password" id="confmdp" name="password2" placeholder="Retapé votre password">
                    </div>

                    <div>
                        <br>
                        <br>
                        <br>
                        <button type="submit" value="Submit"  name="submit">Valider</button>
                        <?php if(isset($erreur)){echo $erreur;}?>
                    </div>
</section>
<script src="/js/app.js"></script>
</body>
<footer>
    <p class="copyright">Gabriel Compagnie / 2020 Copyright &copy;</p>
    <div class="liens">
        <a href="https://github.com/gabriel-rigaud" target="_blank"><img src="/img/github.gif" width="70" alt="Github"></a>
        <a href="https://gabriel-rigaud.students-laplateforme.io/" target="_blank"><img src="/img/document.gif" width="70" alt="Cv"></a>
    </div>
</footer>
</html>