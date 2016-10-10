<?php
include "Verification_session.php";
/*session_start();*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<?php
echo "Connexion reussi" . "<br>";
if(isset($_SESSION['nom_membre']))
	{
		echo $_SESSION['nom_membre'];
		/*session_destroy($_session["Erreur"]);*/
	}
?>

<div class = "main-content">
    <legend> Action </legend>
        <form id="formu_connexion" name="formu_connexion" method="post" action="Gestion_compte.php">
            <fieldset>
                <div class="buttonSubmit">
                	<input  type="submit" value="Gestion Compte" />
                </div>
            </fieldset>
        </form>
</div>
</body>
</html>