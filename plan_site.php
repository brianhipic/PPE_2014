<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>Plan du site</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
			<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SHOLTES Melody" />
			<link rel="shortcut icon" type="image/x-icon" href="img/ffe.ico" />
			<link rel="stylesheet" href="css/plan_site.css"/>
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
			<!--Debut en-t�te de page-->
			<header>
				<img src="img/logo_hipic.png" width="178" height="101" alt="cheval" id="logo"/>
				<a href="https://twitter.com/FFEquitation" target="_blank"> <img src="img/twitter.png" width="50" height="50" alt="tweet" id="icone1"/></a>
				<a href="https://www.facebook.com/FFEofficiel" target="_blank"> <img src="img/fb.png"width="50" height="50" alt="Facebook" id="icone1"/></a>

			</header>
			<!--Fin en-t�te de page-->
	<div id="bloc_menu">
			<ul id="menu">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="#">Qui sommes-nous ?</a>
					<ul>
						<li> <a href="presentation_ffe.php">Pr�sentation </a> </li>
						<li> <a href="disciplines_ffe.php">Disciplines </a> </li>
						<li> <a href="missions_ffe.php">Missions </a> </li>
					</ul>
				</li>
				<li><a href="#"> Espace Membre</a>
						<ul>
							<li> <a href="connexion_adherent.php">Adh�rent</a> </li>
							<li> <a href="connexion_centre.php">Centre</a> </li>
						</ul>
				</li>
				<li>
						<a href="#">Inscription</a>
						<ul>
								<li><a href="inscription_a.php">Adh�rant</a></li>
								<li><a href="inscription_c.php">Centre</a></li>
						</ul>
				</li>
				<li>
						<a href="#"> Une Question ?</a>
						<ul>
								<li>
										<a href="contact.php">Nous contacter</a>
								</li>
				</ul>
				</li>
			</ul>
		</div>
		
		
		
		<h1> Plan du site </h1>
<ul> 
	<li><a href="index.php">Accueil</a></li>
	<ul>
		<p>Qui sommes-nous ?</p>
			<ul>
				<li> <a href="presentation_ffe.php">Pr�sentation </a> </li>
				<li> <a href="disciplines_ffe.php">Disciplines </a> </li>
				<li> <a href="missions_ffe.php">Missions </a> </li>
			</ul>

		<p> Espace Membre</p>
			<ul>
				<li><a href="connexion_adherent.php">Adh�rent</a></li>
				<li><a href="connexion_centre.php">Centre</a></li>
			</ul>

				
				<ul>
				<li>
						<p>Guide utilisation</p>
						<ul>
								<li><a href="documentation_utilisateur.pdf">pdf</a></li>
								<li><a href="video.php">video</a></li>
						</ul>
				</li>
				</ul>
				<ul>
				
				</ul>


				<li>
						<p>Inscription</p>
						<ul>
								<li><a href="inscription_a.php">Adh�rant</a></li>
								<li><a href="inscription_c.php">Centre</a></li>
						</ul>
				</li>

				<li>
						<p> Une Question ?</p>
						<ul>
								<li>
										<a href="contact.php">Nous contacter</a>
								</li>
						</ul>
				</li>

	</ul>
</ul>
		<!-- Debut: pied de page -->
		<div id="bloc_footer">
			<footer>
				<table border="0" width="100%" height="100%">
					<!--<td align="middle" width="33%">
					<img src="img/cheval_logo.png"  width="100" height="100"alt="cheval" id="logo_horse"/>
					</td> -->
					<td>
					<a href="plan_site.php" class="white_link">Plan du site</a>
					</td>
					<td>
					<a href="adresse.php">Adresse</a>
					</td>
					<td>
					<a href="contact.php">Contact</a>
					</td>
				</table>
			</footer>
		</div>
		<!-- Fin: pied de page -->
		</body>

	</html>