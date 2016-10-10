<?php
	session_start();
	include ("Connexion.php");
	$Categorie = isset($_POST["categorie"]) ? htmlentities($_POST["categorie"]) : "Erreur!";
	$cpt = 1;
	if($Categorie < 4)
	{
		$reponsVraie = $CNN->prepare('CALL AllPict(:Categorie)');
		$reponsVraie->bindparam('Categorie',$Categorie,pdo::PARAM_INT);	
		$reponsVraie->execute();
		while ($donneesVrai = $reponsVraie->fetch())
		{
			$Url = "images/ImagesVrai/".$donneesVrai['image']."";
			echo '<div class="3u 12u(mobile)">';
			echo '<section>';
			echo '<a href="javascript:Popup('."'".$Url."'".')" class="bordered-feature-image">';
			echo '<img id="Images" width="200px" height="150px" src="'.$Url.'" alt="'.$donneesVrai	 															  					['description'].'"/>';
			echo '</a>';
			echo '<p align="center">
					Description du paysage : '.$donneesVrai['description'].'<br />';
			if(isset($_SESSION['no']))
			{
				include ("button.php");	
			}
			if(!isset($_SESSION['no']))
			{
				echo '<p align="center" style="margin-top:-20%;"><br /> Nombre de vote(s) : '.$donneesVrai['nbreLiked'].'</p></div>';
			}
			echo '</section>';
			echo '</div>';
			$cpt++;
		}
		$reponsVraie->closeCursor();		
	}
	else
	{
		$reponsVraie = $CNN->prepare('CALL Pictures()');
		$reponsVraie->execute();
		while ($donneesVrai = $reponsVraie->fetch())
		{
			$Url = "images/ImagesVrai/".$donneesVrai['image']."";
			echo '<div class="3u 12u(mobile)">';
			echo '<section>';
			echo '<a href="javascript:Popup('."'".$Url."'".')" class="bordered-feature-image">';
			echo '<img id="Images" width="200px" height="150px" src="'.$Url.'" alt="'.$donneesVrai	 															  					['description'].'"/>';
			echo '</a>';
			echo '<p align="center">
					Description du paysage : '.$donneesVrai['description'].'<br />';
			if(isset($_SESSION['no']))
			{
				include ('button.php');	
			}
			if(!isset($_SESSION['no']))
			{
				echo '<p align="center" style="margin-top:-20%;"><br /> Nombre de vote(s) : '.$donneesVrai['nbreLiked'].'</p></div>';
			}
			echo '</section>';
			echo '</div>';
			$cpt++;
		}
		$reponsVraie->closeCursor();	
	}
	
?>