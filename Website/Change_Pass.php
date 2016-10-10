<?php
try
{
	include "Verification_session.php";
	include ('Connexion.php');
	$PassToChange = isset($_POST["Cpassword"]) ? htmlentities($_POST["Cpassword"]) : 'ERREUR';
	$reponse = $CNN->prepare('call Changer_Password(:mail,:PassToChange)');
	$reponse -> bindparam('mail',$_SESSION['mail'],pdo::PARAM_INT); 
	$reponse -> bindparam('PassToChange',$PassToChange,pdo::PARAM_INT);
	$reponse->execute();
	$reponse->closeCursor();		
	echo $_SESSION['mail'];
	
	header("location:membre.php?change=1");
}
catch (PDOexception $erreur)
{
	echo 'Erreur : ' . $erreur->getMessage();	
}

?>