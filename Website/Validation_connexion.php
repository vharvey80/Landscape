<?php
session_start();
include "Connexion.php";
$mail = (isset($_POST["comail"]))?htmlentities($_POST["comail"]):"ERREUR";
//$_SESSION['mail'] = $mail;
$password = (isset($_POST["copassword"]))?htmlentities($_POST["copassword"]):"ERREUR";
$Chackpassword = "";
$nom = "";
$prenom = "";
$no = "";
$cpt = 0;
try
{
			
				$reponse = $CNN->prepare('select no_membre,email,password_membre,nom_membre, prenom_membre from tbl_membre where email = :mail');
				$reponse->execute(array('mail'=>$mail));
			while ($donnees = $reponse->fetch())
			{
				$cpt++;
				 $Chackpassword = $donnees['password_membre'];
				 $nom = $donnees['nom_membre'];
				 $prenom = $donnees['prenom_membre'];
				 $no = $donnees['no_membre'];
			}
			$reponse->closeCursor();
}
catch (PDOexception $erreur)
{
	echo 'Erreur : ' . $erreur->getMessage();
}
if ($cpt == 1)
{
	//$_SESSION['mail'] = $mail;
	if ($Chackpassword == $password)
	{
		$_SESSION['nom_membre'] = $nom;
		$_SESSION['prenom_membre'] = $prenom;
		$_SESSION['mail'] = $mail;
		$_SESSION['no'] = $no;
		$_SESSION['pw'] = $Chackpassword;
		header("location:index.php");
		//echo $_SESSION['pw'];
	}
	else
	{
		$_SESSION['Erreur'] = "";
		header("location:ConnexionUI.php?err=1&mail=".$mail."");
		echo $_SESSION['Erreur'];
		echo "passe";
	}
}
else
{
	$_SESSION['Erreur'] = "";
	header("location:ConnexionUI.php?err=2&mail=".$mail."");
	echo $_SESSION['Erreur'];
	echo "email";
}
?>