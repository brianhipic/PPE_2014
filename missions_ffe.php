<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>Missions</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
			<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SCHOLTES Melody" />
			<link rel="shortcut icon" type="image/x-icon" href="img/ffe.ico" />
			<link rel="stylesheet" href="css/ffe.css"/>
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
					</ul>
				</li>
				<li><a href="#"> Espace Membre</a>
						<ul>
							<li>
								<a href="connexion_adherent.php">Adhérent</a>
							</li>

							<li>
								<a href="connexion_centre.php">Centre</a>
							</li>
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
						<a href="#"> Espace Admin</a>
						<ul>
							
										<li><a href="admin_news/index.php">gérer les news</a></li>
										<li><a href="admin_suppression/index.php">gérer les centres et les adhérents </a></li>
								
						</ul>
				</li>
			</ul>
		</div>
			<h1>Fédération Française d'Equitation (FFE)</h1>
				<center><img src="img/ffe.ico"></center>
				<h2>Les missions</h2>

					<p><span class="PremiereLettre">•	</span>Elle cherche à favoriser une vie en société harmonieuse dans le respect des autres, de la vie animale et du milieu naturel</p>
					<p><span class="PremiereLettre">•	</span>La FEE délivre des licences et évalue le niveau de maîtrise technique des pratiquants licenciés à la fédération</p>
					<p><span class="PremiereLettre">•	</span>Elle organise des épreuves sportives départementales, régionales, nationales ou internationales</p>
					<p><span class="PremiereLettre">•	</span>Elle élabore et définit les règlements sportifs des activités équestres</p>
					<p><span class="PremiereLettre">•	</span>Elle met en place des relations internationales</p>
					<p><span class="PremiereLettre">•	</span>La FEE est chargée de la promotion des activités équestres via des publications, organisation d’assemblées ou de congrès</p>
			<!-- Debut: pied de page -->
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