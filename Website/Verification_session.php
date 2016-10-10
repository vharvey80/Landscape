<?php
	session_start();
	if(!isset($_SESSION['nom_membre']))
	{
		//echo "Allo!";
		session_destroy();
		/*header("location:index.php");*/
	}
	else
		if(isset($_SESSION['prenom_membre'])){ echo '<div style="color:#FFF;">Bienvenue : ' . $_SESSION['prenom_membre'] . ' ' . 			 			$_SESSION['nom_membre'] . '</div>'; /*echo $_SESSION['no'];*/ } 
?>