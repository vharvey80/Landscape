<div class="12u 12u(mobile)">
    <header id="conn" class="container">
        <h1><a href="#" id="logo">Modifier les infos</a></h1>
    </header>
    <div id="conn" style="padding-top:6%;">
        <h3><a href="#" id="logo">Renseignements des noms</a></h3>
    </div>
    <?php
	 	include('Connexion.php');
		if(isset($_SESSION['no']))
		{
			$reponse = $CNN->query('SELECT password_membre from tbl_membre where no_membre ='.$_SESSION['no']);
			while ($donnees = $reponse->fetch())
			{
				$_SESSION['pw'] = $donnees['password_membre'];
			}
			$reponse->closeCursor();
		}
	?>
    <div id="banner">
        <form id="formu_changeNom" name="formu_changeNom" method="post" action="Change_Names.php">
            <fieldset> 
				<?php /*echo '<div align="center"><a href="membre.php?modif=1" style="color:#FFFF00; font-size:20px; padding-right:20%;">Modifier le prénom et le nom</a>
							<a href="membre.php?modif=2" style="color:#FFFF00; font-size:20px;">Modifier le mot de passe</a></div>';*/
				?> 
                </section>
                <div style="margin-top:2%;">
					<section>
                        <label for="Cmembre" style="padding-right:6.3%; font-size:24px;"> Nom </label>
                        <input id="Cmembre" name="Cmembre" type="text" style="width:90%;" />
                    </section>
    
                    <section>
                        <label for="Cprenom" style="padding-right:4.3%; font-size:24px;"> Prénom </label>
                        <input id="Cprenom" name="Cprenom" type="text" style="width:90%;" />
                    </section>
                    <div class="buttonSubmit">
                        <input type="submit" class="button-moy" value="Modifier les noms" style="margin-left:66.5%; width:33%; font-size:24px;">
                    </div>
                </div>
                <?php
					if(isset($_GET['change']))
					{
						if(htmlentities($_GET['change']) == 2)
						{
							echo '<div><ul class="check-list">
									<li>Changement effectué!</li></ul></div>';
						}
					}
				?>
        	</fieldset>
        </form>
	</div>
    <div id="conn" style="padding-top:6%;">
        <h3><a href="#" id="logo">Renseignements du mot de passe</a></h3>
    </div>
    <div id="banner">
        <form id="formu_ChangePass" name="formu_ChangePass" method="post" action="Change_Pass.php">
            <fieldset> 
                <div style="margin-top:2%;">
                    <section>
                        <label for="Cpassword" style="padding-right:2.9%; font-size:24px;"> Password </label>
                        <input id="Cpassword" name="Cpassword" type="password" style="width:90%;" />
                    </section>
                    <section>
                        <label for="Crepassword" style="padding-right:1%; font-size:24px;"> Confirmation </label>
                        <input id="Crepassword" name="Crepassword" type="password" style="width:90%;" />
                    </section>
                    <div class="buttonSubmit">
                        <input type="submit" class="button-moy" value="Modifier le mot de passe" style="margin-left:66.5%; width:33%; font-size:24px;">
                    </div>
                </div>
                <?php
					if(isset($_GET['change']))
					{
						if(htmlentities($_GET['change']) == 1)
						{
							echo '<div><ul class="check-list">
									<li>Changement effectué!</li></ul></div>';
						}
					}
				?>
            </fieldset>
        </form>
    </div>
	<script>
    $("#formu_ChangePass").validate({
        rules:{ 
            Cpassword:{required : true,
                        minlength: 5},
            Crepassword:{required : true,
                        equalTo: "#Cpassword"},
        },
        messages:{ 
            Cpassword:{required: "Le password est obligatoire",
                    minlength: "Le passord doit avoir 5 caractères minimum"},
            Crepassword:{required: "La confirmation du  password est obligatoire",
                        equalTo : "Le mots de passe n'est pas identique"},
    }})	
	$("#formu_changeNom").validate({
        rules:{ 
			Cmembre:{required : true},
            Cprenom:{required : true},
        },
        messages:{ 
			Cmembre:{required : "Le nom est obligatoire"},
            Cprenom:{required : "Le prénom est obligatoire"},
    }})								
    </script>
    </div>
    <header id="like" class="container">
    	<h1><a href="#" id="logo">Mes 3 derniers likes</a></h1>
    </header>