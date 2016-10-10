<?php
	try
	{
		$CNN = new PDO('mysql:host=localhost;dbname=project_final', 'root', '');
		$CNN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOexeption $erreur)
	{
		echo 'Erreur :' .$erreur->getMessage();
	}
?>