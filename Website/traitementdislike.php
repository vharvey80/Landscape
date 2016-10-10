<?php 
	session_start();
	if(!isset($_SESSION['no']))
	{
		header("location:ConnexionUI.php?con=1");	
	}
	else
	{
		//echo $_SESSION['no'];
		if(isset($_POST['dataVrai']))
		{
			//echo "Connecté et like!<br />";
			$Paysage = $_POST['dataVrai'];
			$Membre = $_SESSION['no'];
			
			include ('Connexion.php');
			if(isset($_SESSION['no']))
			{
				/* Stored Proc pour vérifier si l'usager à déjà votez ? */
				$reponse = $CNN->prepare('CALL ButtonLike(:NoEmp,:NoPaysage)');
				$reponse->bindparam('NoEmp',$Membre,pdo::PARAM_INT);	
				$reponse->bindparam('NoPaysage',$Paysage,pdo::PARAM_INT);	
				$reponse->execute();
				if ($donnees = $reponse->fetch())
				{
					//echo "like";
					$reponseLike = $CNN2->prepare('CALL Liked(:NoEmp,:NoPaysage)');
					$reponseLike->bindparam('NoEmp',$Membre,pdo::PARAM_INT);	
					$reponseLike->bindparam('NoPaysage',$Paysage,pdo::PARAM_INT);	
					$reponseLike->execute();	
					$reponseLike->closeCursor();	
				}
				else
				{
					//echo "pas like";
					$reponseDislike = $CNN2->prepare('CALL Dislike(:NoEmp,:NoPaysage)');
					$reponseDislike->bindparam('NoEmp',$Membre,pdo::PARAM_INT);	
					$reponseDislike->bindparam('NoPaysage',$Paysage,pdo::PARAM_INT);	
					$reponseDislike->execute();	
					$reponseDislike->closeCursor();
				}
				$reponse->closeCursor();
			}
		}
		include ('SectionMembre.php');
		include ('Section3Like.php');
	}
?>