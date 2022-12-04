<?php
session_start();

//La page ne s'affiche que si la SESSION 'connexion' est bien crée (en page connexion)
if(!isset($_SESSION['connexion']))
{
    //Autrement on redirige vers connexion
    header('location: connexion.php');
    exit();
}
//ici on stocke le contenu de la variable SESSION (le login entré precedemment) dans $loginverify
//pour pouvoir l'utiliser pour fixer la ligne lors de la requete UPDATE
$loginverify = $_SESSION['connexion'];

//on verifie que le boutton submit a bien été cliqué
if(isset($_POST['submit']))
{
    //on verifie que le formulaire ne soit pas vide
    if(!empty($_POST))
    {
        //on utilise des variables intermédiaires
        $login= $_POST['login'];
        $prenom= $_POST['prenom'];
        $nom= $_POST['nom'];
        $password = $_POST['password'];
        $password2= $_POST['password2'];

        //on verifie que les deux mots de passe soit similaires
        if($password==$password2)
        {
            //hachage du password
            $password3 = password_hash($password, PASSWORD_BCRYPT, array('cost' =>10 ));

            //coonexion a la BDD
//            $connexion = mysqli_connect("localhost","root","","moduleconnexion") or die('erreur');
            $connexion = mysqli_connect("localhost:3306","Gabriel","ViveLeDev","gabriel-rigaud_moduleconnexion") or die('erreur');
            //ici on verifie qu'une ligne contenant déjà le login choisi n'existe pas
            $reget = ("SELECT * FROM utilisateurs WHERE login='$login' ");
            //lancement de la requete
            $regetx = mysqli_query($connexion, $reget);
            //cette fonction compte le nombre de lignes retourné
            $row = mysqli_num_rows($regetx); //elle ne retournera que 0 ou 1 puisque on a verouillé les doulbons dans la page inscription

            //si le resultat est 0 c'est qu'il n'y a pas de doublon
            if($row==0)
            {
            //on peut alors lancer la requete UPDATE pour changer les infos
            $requete = ("UPDATE `utilisateurs` SET login = '$login', prenom = '$prenom', nom = '$nom', password = '$password3' WHERE login = '$loginverify' ");
            $query = mysqli_query($connexion, $requete);
            echo "<p style='color: white'>" . "Vous avez bien modifié vos informations". "</p>";
            }
            else echo "<p style='color: white'>" . "Ce pseudo existe deja". "</p>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /></html>
    <link rel="icon" type="image/png" href="/img/logo.jpg">
</head>

</header>
    <div class="topnav" id="myTopnav">
        <div class="logo"> <img src="/img/logo.jpg" width="90"></div>
        <a href="/html/index.html">Accueil</a>
        <a href="connexion.php">Connexion</a>
        <a href="inscription.php">Inscription</a>
        <a href="#" class="active">Profil</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>

<body>
<section id="contact">
    <div class="container">
        <div class="titre">
            <h1>Profil</h1>
            <p>Modifié vos informations !</p>
        </div>
        <form action="profil.php" method="post">
            <div>
                <label for="login">Votre Login :</label>
                <input type="text" id="login" name="login" placeholder="Entrer votre login" required>
            </div>
            <div>
                <label for="first">Votre Prénom :</label>
                <input type="text" id="first" name="prenom" placeholder="Entrer votre prénom" required>
            </div>
            <div>
                <label for="name">Votre Nom :</label>
                <input type="text" id="name" name="nom" placeholder="Entrer votre nom" required>
            </div>
            <div>
                <label for="mdp">Password&nbsp;: </label>
                <input type="password" id="mdp" name="password" placeholder="Entrer votre password" required>
            </div>

            <div>
                <label for="confmdp">Confirmé&nbsp;:</label>
                <input type="password" id="confmdp" name="password2" placeholder="Re rentrer password" required>
            </div>

            <div>
                <br><br><br>
                <button type="submit" name="submit">Valider</button>
                <a style="color:white; text-decoration:none;" href="deconnexion.php">Deconnexion</a>
            </div>
</section>

<script src="/js/app.js"></script>

<footer>
    <p class="copyright">Gabriel Compagnie / 2020 Copyright &copy;</p>
    <div class="liens">
        <a href="https://github.com/gabriel-rigaud" target="_blank"><img src="/img/github.gif" width="70" alt="Github"></a>
        <a href="https://gabriel-rigaud.students-laplateforme.io/" target="_blank"><img src="/img/document.gif" width="70" alt="Cv"></a>
    </div>
</footer>
</body>
</html>