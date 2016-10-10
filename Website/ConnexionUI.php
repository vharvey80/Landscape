<!DOCTYPE HTML>
<html>
	<head>
		<title>Paysagestastique - Connexion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <script src="assets\Validation\jquery-validation-1.14.0\lib\jquery-1.11.1.js"></script>
		<script src="assets\Validation\jquery-validation-1.14.0\dist\jquery.validate.min.js"></script>
        <script src="assets\Validation\jquery-validation-1.14.0\dist\localization\messages_fr.js"></script>
        
	</head>
	<body class="subpage">
		<div id="page-wrapper">
            <div id="header-wrapper">
				<?php include ("nav.php");?>
                <?php
					if(isset($_GET['err']))
					{
						if($_GET['err'] == '1')
						{
							echo '<div align="center" class="error">Mauvais mot de passe</div>';
						}
						else if($_GET['err'] == '2')
						{
							echo '<div align="center" class="error">Email inexistant</div>';	
						}
					} 
					
					if(isset($_SESSION['mail']))
					{
						/*echo "mail set";*/
						$mail = (isset($_SESSION['mail']))?htmlentities($_SESSION['mail']):"Erreur";
						echo "<br>" . $mail;
					}
					else
					{
						/*echo "mail not set";*/
						$mail = "";
					}
					
					if(isset($_GET['con']))
					{
						if(htmlentities($_GET['con']) == '1')
								echo '<div align="center" class="error">Vous devez vous connectez pour pouvoir voter...</div>';							
					}
				?>
			<!-- Content -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row">
								<div class="12u 12u(mobile)">
                                	<!-- Main Content -->
                                	<?php include ('SectionConnexion.php'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
                <?php include ("Copyrights.php"); ?>
        	</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>