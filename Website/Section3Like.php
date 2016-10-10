<?php
	include ("Connexion.php");
	$NoEmp = isset($_SESSION['no']) ? $_SESSION['no'] : "";
	$cpt = 1;
	$reponsVraie = $CNN->prepare('CALL Last3Like(:NoEmp)');
	$reponsVraie->bindparam('NoEmp',$NoEmp,pdo::PARAM_INT);	
	$reponsVraie->execute();
	while ($donneesVrai = $reponsVraie->fetch())
	{
		$Url = "images/ImagesVrai/".$donneesVrai['image']."";
		echo '<div class="4u 12u(mobile)">';
		echo '<section>';
		echo '<a href="#" class="bordered-feature-image">';
		echo '<img id="Images" width="200px" height="150px" src="'.$Url.'" alt="'.$donneesVrai	 															  					['description'].'"/>';
		echo '</a>';
		echo '<p align="center">
				Description du paysage : '.$donneesVrai['description'].'<br />';
		if(isset($_SESSION['no']))
		{
			$reponse = $CNN2->prepare('CALL ButtonLike(:NoEmp,:NoPaysage)');
			$reponse->bindparam('NoEmp',$_SESSION['no'],pdo::PARAM_INT);	
			$reponse->bindparam('NoPaysage',$donneesVrai['no_paysage'],pdo::PARAM_INT);	
			$reponse->execute();
			if ($donnees = $reponse->fetch())
			{
				echo '<input type="submit" onClick="like(this)" class="button-smallDis" value="Je n\'aime plus" alt="'.$donneesVrai['no_paysage'].'" id="btnLike'.$cpt.'"/>';
			}				
			else
			{
				echo '<input type="submit" onClick="like(this)" class="button-small" value="J\'aime" alt="'.$donneesVrai['no_paysage'].'" id="btnLike'.$cpt.'"/>';
			}
			$reponse->closeCursor();	
		}
		echo '</p>';
		echo '</section>';
		echo '</div>';
		$cpt++;
	}
	$reponsVraie->closeCursor();
	if($cpt <= 1)
		echo "<h1> Aucunes photos sont aimés par vous ... </h1>";
?>