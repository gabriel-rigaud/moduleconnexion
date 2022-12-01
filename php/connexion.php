<?php
session_start();

if(isset($_POST['submit']))
{
    if(!empty($_POST))
    {
        $login = $_POST['login'];
        $password= $_POST['password'];
        $bd = mysqli_connect("localhost","root","","moduleconnexion");
        $requete = mysqli_query($bd, "SELECT login, password FROM `utilisateurs` WHERE login='$login' ");

        //on va utiliser num_rows pour verifier que l'utilisateur existe
        $resultat = mysqli_num_rows($requete);

        //on fait un fetch row pour recup la ligne
        $resultat2 = mysqli_fetch_row($requete);

        //Decryptage du password
        $verify = password_verify($password, $resultat2[1]);
    }

    //si verify existe
    if($verify==true)
    {
        if($resultat2[0]=='admin') //on verifie seulement le login puisque le password à deja été verifié
        {
            // session_start();
            $_SESSION['admin'] = 'admin';
            header('location: admin.php');
            exit();
        }

        if($resultat==1);
        {
            // session_start();
            $_SESSION['connexion'] =  $login ;
            header('location: profil.php');
            exit();
        }

    }
}

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
        <a href="#" class="active">Connexion</a>
        <a href="inscription.php">Inscription</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>
<body>
    <section id="contact">
        <div class="container">
            <div class="titre">
                <h1>Connexion</h1>
                <p>Connecte toi !</p>
            </div>
            <form action="connexion.php" method="post">
                <div>
                    <label for="login">Votre Login :</label>
                    <input type="text" id="login" name="login" placeholder="Entrer votre login" required>
                </div>

                <div>
                    <label for="motdepasse">Votre Password :</label>
                    <input type="password" id="mdp" name="password" placeholder="Entrer votre password" required>
                </div>
                <div>
                    <br>
                    <br>
                    <br>
                    <button type="submit" name="submit" >Valider</button>
                </div>
            </form>
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