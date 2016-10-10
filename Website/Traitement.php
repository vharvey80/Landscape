<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
		include ("Redim.php");
		include ("donne_nom.php");
		
		$ImagesAvecExt = strpos($_FILES['AddUrl']['name'], '.');
		$ImagesSansExt = substr($_FILES['AddUrl']['name'], 0, $ImagesAvecExt);
		
		if(!empty($_FILES['AddUrl']['tmp_name']))
		{
			echo "Le fichier temporaire existe!<br>";	
			if(is_uploaded_file($_FILES['AddUrl']['tmp_name']))
			{
				echo "Fichier uploadé sur le server!<br>";
				if(filesize($_FILES['AddUrl']['tmp_name']) < 1048576)
				{
					echo "La taille du fichier est respectée!<br>";	
					$infosfichier = pathinfo($_FILES['AddUrl']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'png','JPG', 'JPEG', 'PNG');
					if (in_array($extension_upload, $extensions_autorisees))
					{
						echo "L'extension est respecté!<br>";
						$realName = $ImagesSansExt . NomComplet();
						move_uploaded_file($_FILES['AddUrl']['tmp_name'],'images/ImagesVrai/'.$realName.'.'.$extension_upload);
						echo "Ficher uploadé!<br>";
						$redimOK = fctredimimage(120,80,'images/ImagesRedim/',$realName.'.'.$extension_upload,'images/ImagesVrai/',$realName.'.'.$extension_upload);
						if ($redimOK == 1) 
						{
							 echo 'Redimensionnement OK !'; 
							 try
							 {
								include("Connexion.php");
								$Description = htmlentities($_POST['AddDescription']);
								$Image = $realName;
								$Categorie = htmlentities($_POST['AddCategorie']);
								$Pays = htmlentities($_POST['AddPays']);
								$No = htmlentities($_POST['hiddenno']);
								try {
										$sql = "insert into tbl_paysage (description, image, no_membre, no_pays) values ('".$Description 												 												."','".$Image.'.'.$extension_upload."','".$No."','".$Pays."')";
										$sth = $CNN->query($sql);
										$reponse = $CNN->query('SELECT max(no_paysage) as NewNo from tbl_paysage');
										while ($donnees = $reponse->fetch())
										{
											$NouveauNumero = $donnees['NewNo'];
										}
										$reponse->closeCursor();
										try {
										$sql = "insert into tbl_categoriepaysage (no_categorie, no_paysage) values ('".$Categorie 												 												."','".$NouveauNumero."')";
										$sth = $CNN->query($sql);
										header('location:AjoutPaysage.php?ajout=1');
											} 
										catch(PDOException $e) {
												echo $e->getMessage();
											}
									} 
								catch(PDOException $e) {
										echo $e->getMessage();
									}	
							} 
							catch(PDOException $e)
							{
									echo $e->getMessage();
							}
						}
					}
					else
						echo "L'extension n'est pas respecté...<br>";
				}
				else
					echo "La taille du fichier est trop haute...<br>";
			}
			else
				echo "Fichier pas uploadé sur le serveur...<br>";
		}
		else
			echo "Le textbox upload est vide...<br>";
	?>
</body>
</html>