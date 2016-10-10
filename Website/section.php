<?php
	include ("Connexion.php");
	$cpt = 1;
	$reponse = $CNN->prepare('CALL MostLike()');
	$reponse->execute();	
	while ($donnees = $reponse->fetch())
	{
			echo '<div class="3u 12u(mobile)">';
			echo '<section>';
			echo '<a href="#" class="bordered-feature-image">';
			echo '<img id="Images" width="200px" height="150px" src="images/ImagesVrai/'.$donnees['image'].'" alt="'.$donnees	 															  					['description'].'"/>';
			echo '</a>';
			echo '<h2 align="center">#'.$cpt.'</h2>';						
			echo '<p align="center">
					 Description du paysage : '.$donnees['description'].'<br />
					 Nombre de vote(s) : '.$donnees['nbreLiked'].'<br />
				 </p>';
			echo '</section>';
			echo '</div>';
			$cpt++;
	}
	$reponse->closeCursor();
	if($cpt < 10)
		echo "<div style='margin-top:2%; margin-left:0%;'><h1> Il n'y a, à l'instant, pas une dizaine de photo de likées ... </h1></div>";		
?>