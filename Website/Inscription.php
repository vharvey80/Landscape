<?php
	//session_start();
	//if(isset($_SESSION['Erreur']) == "Mauvais mot de passe") {$_SESSION['Erreur'] = "";}
?>	
<!doctype html>
<html>
	<head>
		<title>Paysagestastique - Inscription</title>
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
				<?php include ("nav.php"); ?>
                <?php
					if(isset($_SESSION['Erreur']))
					{
						//echo $_SESSION['Erreur'];
						if(isset($_SESSION['Erreur']) != "")
							echo '<div align="center" class="error">'.$_SESSION['Erreur'].'</div>';
					}
				?>
			<!-- Content -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row">
								<div class="12u 12u(mobile)">

									<!-- Main Content -->
                                    <?php include('SectionInscription.php'); ?>								
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