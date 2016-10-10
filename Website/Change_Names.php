<?php
try
{
	include "Verification_session.php";
	include ('Connexion.php');
	$NameToChange = isset($_POST["Cmembre"]) ? htmlentities($_POST["Cmembre"]) : 'ERREUR';
	$FNameToChange = isset($_POST["Cprenom"]) ? htmlentities($_POST["Cprenom"]) : 'ERREUR';
	if($FNameToChange != 'ERREUR')
	{
		$reponse = $CNN->prepare('call Changer_Nom(:mail,:NameToChange,:FNameToChange)');
		$reponse -> bindparam('mail',$_SESSION['mail'],pdo::PARAM_INT); 
		$reponse -> bindparam('NameToChange',$NameToChange,pdo::PARAM_INT);
		$reponse -> bindparam('FNameToChange',$FNameToChange,pdo::PARAM_INT);
		$reponse->execute();
		$reponse->closeCursor();		
		echo $_SESSION['mail'];
		$_SESSION['nom_membre'] = $NameToChange;
		$_SESSION['prenom_membre'] = $FNameToChange;
		
		header("location:membre.php?change=2");
	}
}
catch (PDOexception $erreur)
{
	echo 'Erreur : ' . $erreur->getMessage();	
}

?>