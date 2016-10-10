<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
		function NomComplet()
		{
			$annee = date("y");
			$mois = date("m");
			$jour = date("d");

			$secondes = date("s");
			$minutes = date("i");
			$heures = date("h");
			
			$vrai_nom_fichier = "_" . $minutes . "_" . $secondes;
			
			return $vrai_nom_fichier;
		}
	?>
</body>
</html>