<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Paysagestastique</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]--> 
	</head>
	<body>
    	<?php //include ('Verification_session.php'); ?>
    	<?php if(isset($_GET['deco'])){ if($_GET['deco'] == '1') { /*session_start();*/ session_destroy(); }} ?>
		<div id="page-wrapper">
            <div id="header-wrapper">
				<?php include ("nav.php"); ?>
            	<?php include ("banner.php"); ?>
			<!-- Features -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row">
                                <header id="titre" class="container">
                                	<h1><a href="#" id="logo">Les 10 plus belles photos!</a></h1>
                                </header>
								<?php include ("section.php"); ?>
							</div>
						</div>
					</div>
				</div>
    		</div>
				<?php include ("content.php"); ?>
				<?php include ("Copyrights.php"); ?>
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