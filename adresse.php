<!doctype html>
<html lang="fr">
	<head>
		<title>Coordonnées</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SCHOLTES Melody" />
		<link rel="shortcut icon" type="image/x-icon" href="img/ffe.ico" />
		<link rel="stylesheet" href="css/adresse.css" />
		<script type="text/javascript">
			<!--
			sfHover = function() 
			{
				var sfEls = document.getElementById("menu").getElementsByTagName("LI");
				for (var i=0; i<sfEls.length; i++)
				{
					sfEls[i].onmouseover=function() 
					{
						this.className+=" sfhover";
					}
					sfEls[i].onmouseout=function() 
					{
						this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
					}
				}
			}
			if (window.attachEvent) window.attachEvent("onload", sfHover);
			-->
		</script>
	</head>

	<body>
		<!--Debut en-tête de page-->
		<header>
			<img src="img/logo_hipic.png" width="178" height="101" alt="cheval" id="logo"/>
			<a href="https://twitter.com/FFEquitation" target="_blank"> <img src="img/twitter.png" width="50" height="50" alt="tweet" id="icone1"/></a>
			<a href="https://www.facebook.com/FFEofficiel" target="_blank"> <img src="img/fb.png"width="50" height="50" alt="Facebook" id="icone1"/></a>
		</header>
		<!--Fin en-tête de page-->

		<div id="bloc_menu">
			<ul id="menu">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="#">Qui sommes-nous ?</a>
					<ul>
						<li> <a href="presentation_ffe.php">Présentation </a> </li>
						<li> <a href="disciplines_ffe.php">Disciplines </a> </li>
						<li> <a href="missions_ffe.php">Missions </a> </li>
					</ul>
				</li>
				<li><a href="#"> Espace Membre</a>
					<ul>
						<li> <a href="connexion_adherent.php">Adhérent</a> </li>
						<li> <a href="connexion_centre.php">Centre</a> </li>
					</ul>
				</li>
				<li>
					<a href="#">Inscription</a>
						<ul>
							<li><a href="inscription_a.php">Adhérant</a></li>
							<li><a href="inscription_c.php">Centre</a></li>
						</ul>
				</li>
				<li>
					<a href="#"> Une Question ?</a>
						<ul>
							<li><a href="contact.php">Nous contacter</a></li>
						</ul>
				</li>
			</ul>
		</div>
		<br />
		<div class="center">
			<fieldset>
				<legend> Coordonnées </legend>
				<h1> Fédération Française d'Equitation F.F.E </h1>
				<h1> 81 Avenue Edouard Vaillant </h1>
				<h1> 92100 BOULOGNE BILLANCOURT </h1>
				<h1> <a href="www.ffe.com"> www.ffe.com </a> </h1>
				<h1> 01 58 17 58 17</h1>
			</fieldset>
		</div>
		<br />
		<div class="carte">
			<iframe src="https://mapsengine.google.com/map/embed?mid=z9io9qBUNjYs.kU6s575p2rKo" width="640" height="480" sandbox="allow-same-origin allow-top-navigation allow-forms allow-scripts"></iframe>
		</div>
		<!-- Debut: pied de page -->
		<br /> <br />
		<div id="bloc_footer">
			<footer>
			<table border="0" width="100%" height="100%">
					<!--<td align="middle" width="33%">
					<img src="img/cheval_logo.png"  width="100" height="100"alt="cheval" id="logo_horse"/>
					</td> -->
					<td align="middle">
					<a href="plan_site.php" class="white_link">Plan du site</a>
					</td>
					<td align="middle">
					<a href="adresse.php">Adresse</a>
					</td>
					<td align="middle">
					<a href="contact.php">Contact</a>
					</td>
					
				</table>
			</footer>
		</div>
		<!-- Fin: pied de page -->
	</body>
</html>