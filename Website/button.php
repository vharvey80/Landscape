<?php
echo '<div id="Modif'.$cpt.'" align="center" style="margin-top:-10%;">';
$reponse = $CNN2->prepare('CALL ButtonLike(:NoEmp,:NoPaysage)');
$reponse->bindparam('NoEmp',$_SESSION['no'],pdo::PARAM_INT);	
$reponse->bindparam('NoPaysage',$donneesVrai['no_paysage'],pdo::PARAM_INT);	
$reponse->execute();
if ($donnees = $reponse->fetch())
{
	echo '<input type="submit" onClick="like(this, '.$cpt.','.$donneesVrai['no_paysage'].','.$donneesVrai['nbreLiked'].')" class="button-smallDis" value="Je n\'aime plus" alt="'.$donneesVrai['no_paysage'].'" id="btn'.$cpt.'"/></p>';
}				
else
{
	echo '<input type="submit" onClick="like(this, '.$cpt.','.$donneesVrai['no_paysage'].','.$donneesVrai['nbreLiked'].')" class="button-small" value="J\'aime" alt="'.$donneesVrai['no_paysage'].'" id="btn'.$cpt.'"/></p>';
}
$reponse->closeCursor();
echo '<p align="center" style="margin-top:-20%;"><br /> Nombre de vote(s) : '.$donneesVrai['nbreLiked'].'</p></div>';
?>