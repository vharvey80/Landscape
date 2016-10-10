<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Paysagestastique - Tous les paysages</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <script src="assets\Validation\jquery-validation-1.14.0\lib\jquery-1.11.1.js"></script>
		<script src="assets\Validation\jquery-validation-1.14.0\dist\jquery.validate.min.js"></script>
        <script src="assets\Validation\jquery-validation-1.14.0\dist\localization\messages_fr.js"></script>
        <script src="assets\Validation\jquery-1.11.3.min.js"></script>
	</head>
	<body class="subpage">
		<div id="page-wrapper">
            <div id="header-wrapper">
				<?php include ("nav.php");
                	if(!isset($_SESSION['no']))
					{
						echo '<div align="center" class="error">Vous devez vous connectez pour pouvoir voter...</div>';							
					}
				?>
			<!-- Content -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row">
								<!-- Main Content -->
								<?php include('SectionPaysage.php'); ?>
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
            <script type="text/javascript">
				var left = (screen.width/2) - (600 /2);
				var top = (screen.height/2) - (500 /2);
			  var style = "top="+top+", left="+left+", width=600, height=500, status=no, menubar=no, toolbar=no scrollbar=no";
				 function Popup(url) {
					window.open(url, "", style);
				 }
			</script>
            <script>
				$(document).ready(function(){$("#addCategorie").change(ma_function);});
				function ma_function(){
					var choix = $("#addCategorie option:selected");
					var output = $.ajax(
					{
					  url : "SectionTous.php",
					  type : 'POST',
					  async:false,
					  data : {categorie:choix.val()},   
					  success : function(output)
								{
									$('#imagesdyn').html(output);
								}			
					});
				}
		</script>
		<script>
				//$(document).ready(function(){$("#formu_like").submit(like);});
				function like(e, cpt, NoPays, nbreLike){
					 //alert(NoPays);
					var output = $.ajax(
					{
					  url : "traitementlike.php", 
					  type : 'POST',
					  async:false,
					  data : {dataVrai:$("#" + e.id).attr("alt"), dataCpt:cpt, dataPays:NoPays, dataLike:nbreLike}, 
					  success : function(output)
								{
									$('#Modif' + cpt).html(output);
								}			
					});
				}
        </script>
 
}

	</body>
</html>