<!DOCTYPE html>
	<html lang="fr">
		<head>
			<title> Accueil </title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SCHOLTES Melody" />
			<link rel="shortcut icon" type="image/x-icon" href="img/ffe.ico" />
			<link rel="stylesheet" href="css/reset.css" />
			<link rel="stylesheet" href="css/index.css" />
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
				<li><a>Qui sommes-nous ?</a>
					<ul>
						<li> <a href="presentation_ffe.php">Présentation </a> </li>
						<li> <a href="disciplines_ffe.php">Disciplines </a> </li>
						<li> <a href="missions_ffe.php">Missions </a> </li>
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
				<li>
						<a href="#"> Guide utilisation </a>
						<ul>
							
										<li><a href="documentation_utilisateur.pdf">tutoriel PDF</a></li>
										<li><a href="video.php">tutoriel video </a></li>
								
						</ul>
				</li>
			</ul>
		</div>
<br />
		<section>
			<article>
			
			<h2>PRESENTATION</h2>
			<img src="img/cheval.jpg" alt="cheval" id="dada" />

				<p>HIPIC est une application web qui permet de gérer l'ensemble des centres équestres d'Île-De-France.</p> 
				</br>
				<p>L'application vous propose plusieurs services : une présentation de la FFE, les espaces membres pour les centres équestres et les adhérents et une partie inscription.</p>
				</br>
				<p> Le but de cette application est de faciliter la diffusion des calendriers de chaque centre équestre afin de rendre plus facile l'inscription à une activité équestre. </p>
			</article>
			<div id="news">
				<aside>
					<h2>À propos de l'auteur</h2>
					<a href="http://www.thotem.com/" target="_blank"> <img src="img/societe.png" width="300" height="80" alt="Thotem" id="icone2" /> </a>

					<p>La société <b>THOT'EM INTERACTIF</b> a fait appel à 3 développeurs web : <b>Julie MALGOUYAT</b>, <b>Mélody SCHOLTES</b> et <b>Brian DA COSTA</b>, afin de répondre correctement aux attentes de la <b>FFE</b>.</p>
					<br/>
					<center> <p> <b> <i> Suivez nous ! </i></b></p></center><a href="https://twitter.com/Thot_em" target="_blank"> <img src="img/tw.png" alt="twitter" id="icone3"/> </a> <a href="https://www.facebook.com/pages/Thotem-Interactif/149495281737099?v=wall" target="_blank"> <img src="img/facebook.png" alt="Facebook" id="icone"/></a> 
				</aside>

				<aside>
					<center><h1><i>News</i></h1></center>
					</br>
				<?php

					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=hipic', 'root', '');
					}

					catch (Exception $e)
					{
						die('Erreur :'.$e->getMessage());
					}
			
					$reponse = $bdd->query('SELECT * from news');

					echo '<center><table border="0" width="100%" height="100%"></center><tr><th></th><th></th></th><tr>'; 

					while ($donnees = $reponse->fetch())
					{
						echo '<td>'.$donnees['DATENEWS'] . '</td><td>'.$donnees['TITRE'].'</td><td><a href=modtest_news.php?modid='.$donnees['ID'].' onclick="window.open(this.href, \'News\', \'left=\'+(screen.width-600)/2+\', top=\'+(screen.height-500)/2+\', height=400, width=600, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, status=no\'); return(false);">lire</a></td>'.'</tr>';
					}

					echo '</tr></table >';
			
					$reponse->closeCursor();

				?>
				</aside>
			</div>
		</section>

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