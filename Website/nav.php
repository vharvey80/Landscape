<!-- Header -->
<header id="header" class="container" >
    <div class="row">
        <div class="12u">
            <!-- Logo -->
            <?php include ('Verification_session.php'); ?>
            <h1><a href="index.php" id="logo">Paysagestastique</a></h1>

        <!-- Nav -->
            <nav id="nav">
                <a href="index.php">Accueil</a>
                 <a href="AllPics.php">Paysages</a>
                <a href="AjoutPaysage.php">Ajout de paysages</a>
                <?php 
                    if(!isset($_SESSION['mail']))
                    {
						echo '<a href="Inscription.php">Inscription</a>';
                        echo '<a href="ConnexionUI.php">Connexion</a>';
                    }
                    else
                    {
                        echo '<a href="membre.php">Membre</a>';
                        echo '<a href="Deconnexion.php">Déconnexion</a>';
                    }
                ?>
                
            </nav>
            
        </div>
	</div>
</header>
