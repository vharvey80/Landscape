<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Paysagestastique - Ajout de paysage</title>
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
				<?php include ("nav.php");
					if(!isset($_SESSION['no']))
					{
						echo '<div align="center" class="error">Vous devez vous connectez pour pouvoir ajouter...</div>';							
					}
				 ?>
			<!-- Content -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row">
								<div class="12u 12u(mobile)">
                                    <!-- Main content -->
                                    <?php include('SectionAjout.php'); ?>
                            	</div>
							</div>
						</div>
					</div>
				</div>
                <?php include ("Copyrights.php"); ?>
        	</div>
		</div>

		<!-- Scripts -->
		<script>
			$("#mon_formu").validate({
			rules:{ 
				AddDescription:{ 
					required : true},
				AddCategorie:{ 
					required : true,
					min : 1},
				AddPays:{ 
					required : true,
					min : 1},
				AddUrl:{ 
					required : true}
			},
			messages:{
				AddDescription:{ 
					required : "<br />La description est obligatoire!"},
				AddCategorie:{ 
					required : "<br />La catégorie est obligatoire!",
					min : "<br />La catégorie est obligatoire!"},
				AddPays:{ 
					required : "<br />Le pays est obligatoire!",
					min : "<br />La pays est obligatoire!"},
				AddUrl:{ 
					required : "<br />L'url est obligatoire!"}
			}
			});
		</script>
		<script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/skel-viewport.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
	</body>
</html>