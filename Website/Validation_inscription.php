<?php
	session_start();
include "Connexion.php";

$mail = (isset($_POST["email"]))?htmlentities($_POST["email"]):"ERREUR";
$cpt = 0 ;
try
{
			
				$reponse = $CNN->prepare('select email from tbl_membre where email = :mail');
				$reponse->execute(array('mail'=>$mail));
			while ($donnees = $reponse->fetch())
			{
				$cpt++;
				 
			}
			$reponse->closeCursor();
}
catch (PDOexception $erreur)
{
	echo 'Erreur : ' . $erreur->getMessage();
}




if ($cpt ==0)
{
	try
		{
			$nom = (isset($_POST["nom"]))?htmlentities($_POST["nom"]):"ERREUR";
			$prenom = (isset($_POST["prenom"]))?htmlentities($_POST["prenom"]):"ERREUR";
			$pseudo = (isset($_POST["pseudo"]))?htmlentities($_POST["pseudo"]):"ERREUR";
			$password = (isset($_POST["password"]))?htmlentities($_POST["password"]):"ERREUR";
				$reponse = $CNN->prepare('call Add_Membre(:nom,:prenom,:mail,:pseudo,:password)');
				$reponse -> bindparam('nom',$nom,pdo::PARAM_STR); 
				$reponse -> bindparam('prenom',$prenom,pdo::PARAM_STR); 
				$reponse -> bindparam('mail',$mail,pdo::PARAM_STR); 
				$reponse -> bindparam('pseudo',$pseudo,pdo::PARAM_STR); 
				$reponse -> bindparam('password',$password,pdo::PARAM_STR);
				$reponse->execute();
			
				$reponse->closeCursor();		
		}
		catch (PDOexception $erreur)
		{
			/*echo 'Erreur : ' . $erreur->getMessage();	*/
			$_SESSION['Erreur'] = $erreur->getMessage();
			header("location:Inscription.php");
		}
	header("location:Inscription.php?inscrit=1");	
}
else
{
	$_SESSION['Erreur'] = "Ce email existe déjà";
	header("location:Inscription.php");
}
?>