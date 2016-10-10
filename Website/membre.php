<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
		<head>
		<title>Paysagestastique - Membre</title>
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
						echo $_SESSION['Erreur'];
					}
					
					if(isset($_SESSION['mail']))
					{
						$mail = (isset($_SESSION['mail']))?htmlentities($_SESSION['mail']):"T";
						//echo "<br>" . $mail;
					}
					else
					{
						$mail = "";
					}
				?>
			<!-- Features -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row" id="test">
								<?php include ("SectionMembre.php"); ?>
                                <?php include ("Section3Like.php"); ?>
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
            <script>
				function like(e){
					var output = $.ajax(
					{
					  url : "traitementdislike.php", 
					  type : 'POST',
					  async:false,
					  data : {dataVrai:$("#" + e.id).attr("alt")}, 
					  success : function(output)
								{
									$('#test').html(output);
								}			
					});
				}
        </script>

	</body>
</html>