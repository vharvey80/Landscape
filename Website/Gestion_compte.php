<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
	<script src="lib/jquery-1.11.1.js"></script>
    <script src="dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../dist/localization/messages_fr.js"></script>
    <link rel="stylesheet" href="demo/marketo/stylesheetperso.css" >
</head>

<body>
	<?php
    include "Verification_session.php";
    echo $_SESSION['mail'];
    ?>
    <h1> Gestion compte </h1>
    
    
    <div class = "main-content">
        <legend> Changer le mot de passe </legend>
            <form id="formu_ChangePass" name="formu_connexion" method="post" action="Change_Pass.php">
                <fieldset>
                    <section>
                        <label for="Cpassword"> Passoword </label>
                        <input id="Cpassword" name="Cpassword" type="password"  />
                    </section>
                    <section>
                        <label for="Crepassword"> Confirmation </label>
                        <input id="Crepassword" name="Crepassword" type="password" />
                    </section>
                    
                    <div class="buttonSubmit">
                        <input  type="submit" value="Changer" />
                    </div>
                </fieldset>
            </form>
            </div>
            
    <div class = "main-content">
        <legend> Déconnection </legend>
            <form id="formu_connexion" name="formu_connexion" method="post" action="Deconnexion.php">
                <fieldset>
                    <div class="buttonSubmit">
                        <input  type="submit" value="Deconnexion" />
                    </div>
                </fieldset>
            </form>
    </div>
     <script>
		$("#formu_ChangePass").validate({rules:{ 
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
	</script>

</body>
</html>