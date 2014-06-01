<?php 

include('functions.php');
// FONCTION
ConnexionBDD();
// FONCTION
$user_connected = ControleAccesUtilisateur('adherent','connexion_adherent.php');


?><!DOCTYPE html>
	<html lang="fr">
		<head>
			<title>Espace adhérent</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="author" content="MALGOUYAT Julie,DA COSTA Brian,SHOLTES Melody" />
			<link rel="icon" href="img/ffe.ico"/>
			<link rel="stylesheet" href="css/reset.css"/>
			<link rel="stylesheet" href="css/espace_adherent.css"/>
			<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

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

<?php
// si l'utilisateur est connecté
if($user_connected):
	 ($_ENV["bdd_utilisateur"]);
?>



			<ul id="menu">
				<li>
					<a href="#">Mon espace</a>
					<ul>
						<li> <a href=modif_a.php?modid=<?php print_r ($_ENV["bdd_utilisateur"]["NUM_ADHERENT"]); ?>>modifier mes données</a> </li>
                      <li>  <a href=supprimer_compte.php?modid=<?php print_r ($_ENV["bdd_utilisateur"]["NUM_ADHERENT"]); ?>>supprimer votre compte</a> </li>
					</ul>
				</li>
                
				<li>
						<a href="#">Centres</a>
						<ul>
								<li><a href="regions/paris.php">75 PARIS</a></li>
                                <li><a href="regions/hauts_de_seine.php">92 HAUTS DE SEINE</a></li>
                                <li><a href="regions/val_doise.php">95 VAL D'OISE</a></li>
                                <li><a href="regions/seine_st_denis.php">93 SEINE SAINT DENIS</a></li>
                                <li><a href="regions/val_de_marne.php">94 VAL DE MARNE</a></li>
                                <li><a href="regions/essonnes.php">91 ESSONNES</a></li>
                                <li><a href="regions/yvelines.php">78 YVELINES</a></li>
                                <li><a href="regions/seine_et_marne.php">77 SEINE-ET-MARNE</a></li>
						</ul>
				</li>

		</ul>
		<br /> <br /> <br /> 
		<section class="center">
			<article>
			
			<h2> BIENVENUE SUR VOTRE ESPACE </h2>
			</br>
			<center> <img src="img/adherent.jpg"alt="cheval" id="dada" /> </center>
			</article>
			<div id="news">
			<aside>
				<h2>Votre espace membre vous permet d'accéder aux menus suivants :</h2>
				<br />
				<br />
			<p>
				<br />
				<br />
				<img src="img/espace.png" width="50" height="50" alt="" id="" class="logo_menu"/>
				<span class="text_menu"><b>Mon espace</b> permet de <u>modifier</u> et/ou <u>supprimer</u> vos données;</span>
				<br />
				<br />
				<img src="img/centre.png" width="50" height="50" alt="" id="" class="logo_menu"/>
				<span class="text_menu"><b>Centres</b> permet de visualiser les informations concernant tous les centres équestres d'Île-de-France;</span>
			</p>
			</aside>
			</div>
		</section>
<?php else: ?>
					<div id="mess_error">
						Votre login et/ou mot de passe est incorrect.
						<br/>
						Vous allez être automatique redirigé vers le formulaire d'authentification dans 15 seocondes. 
						<br/>
						<a href="connexion_adherent.php"> Cliquez ici pour y accéder directement</a>
					</div>
<?php endif; ?>
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

	</html><?php DeconnexionBDD();?>