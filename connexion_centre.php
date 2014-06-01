<html>

	<head>
		<title> Accès Centre </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="icon" href="img/ffe.ico"/>
		<link rel="stylesheet" href="css/style_session.css"/>
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
							<li>
								<a href="connexion_adherent.php">Adhérent</a>
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
		<br /><br /><br /><br /><br />
<div id="formulaire_adh">
	<form action="espace_centre.php" method="post">
</br>
			<center><fieldset>
			<legend> ACCES CENTRE </legend>
			</br>
				<center><table>
					<tr><td> <label for="login">login: *</label> </td><td> <input type="text" name="login" id="login" class="champ" placeholder="Votre email" maxlength="250" required /> </td></tr>
					<tr><td> <label for="password">Password : *</label> </td><td> <input type="password" name="pass" id="password" class="champ" placeholder="Votre mot de passe" maxlength="250" required /> </td></tr>
				
				</table>
				</br>
				<center><input type="submit" value="Connexion" class="bouton"></center>
				
			</fieldset>

	</form>
</div>
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